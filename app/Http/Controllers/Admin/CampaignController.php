<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('campaigns')->orderBy('id','DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status',function($row){
                    if ($row->status==1) {
                        return '<a href="#"><span class="badge badge-success">Active</span> </a>';
                    }else{
                        return '<a href="#"><span class="badge badge-danger">Inactive</span> </a>';
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>

                        <a href="'.route('campaign.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                        </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.offer.campaign.index');
    }


    //store campaign
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:campaigns|max:55',
            'start_date' => 'required',
            'image' => 'required',
            'discount' => 'required',
        ]);

        //working with image
        $photo=$request->image;
        $slug=Str::slug($request->title, '-'); //its only for image name
        $photoname=$slug.'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(468,90)->save('files/campaign/'.$photoname);  //image intervention
        $data['image']='files/campaign/'.$photoname;   // public/files/brand/plus-point.jpg

        Campaign::insert([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'image' => 'files/campaign/'.$photoname,
            'discount' => $request->discount,
            'month' => date('F'),
            'year' => date('Y')
        ]);

        $notification=array('message' => 'Campaign Inserted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //delete method
    public function destroy($id)
    {
        $data=DB::table('campaigns')->where('id',$id)->first();
        $image=$data->image;
        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('campaigns')->where('id',$id)->delete();
        $notification=array('message' => 'Campaign Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //campaign edit method
    public function edit($id)
    {
        $data=DB::table('campaigns')->where('id',$id)->first();
        return view('admin.offer.campaign.edit',compact('data'));
    }

    //update campaign
    public function update(Request $request)
    {
        $slug=Str::slug($request->title, '-');
        $data=array();
        $data['title']=$request->title;
        $data['start_date']=$request->start_date;
        $data['end_date']=$request->end_date;
        $data['status']=$request->status;
        $data['discount']=$request->discount;

        if ($request->image) {
            if (File::exists($request->old_image)) {
                unlink($request->old_image);
            }
            $photo=$request->image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(468,90)->save('files/campaign/'.$photoname);
            $data['image']='files/campaign/'.$photoname;
            DB::table('campaigns')->where('id',$request->id)->update($data);
            $notification=array('message' => 'Campaign Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('campaigns')->where('id',$request->id)->update($data);
            $notification=array('message' => 'Campaign Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

}
