<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){

        if ($request->ajax()){

            $data = DB::table('pickup_point')->latest()->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($row){
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                          <a href="'.route('pickuppoint.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete_pickuppoint"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;

                })->rawColumns(['action'])
                ->make(true) ;

        }
        return view('admin.pickup_point.index');
    }

    public function store(Request $request){

        $data = array(
            'pickup_point_name' => $request->pickup_point_name,
            'pickup_point_address' => $request->pickup_point_address,
            'pickup_point_phone' => $request->pickup_point_phone,
            'pickup_point_phone_two' => $request->pickup_point_phone_two,

        );

        DB::table('pickup_point')->insert($data);
        return response()->json('Pickup Point Added Successfully!');
    }
    public function edit($id){

        $data = DB::table('pickup_point')->where('id','=',$id)->first();
        return view('admin.pickup_point.edit',compact('data'));
    }

    public function update(Request $request){
        $data = array(
            'pickup_point_name' => $request->pickup_point_name,
            'pickup_point_address' => $request->pickup_point_address,
            'pickup_point_phone' => $request->pickup_point_phone,
            'pickup_point_phone_two' => $request->pickup_point_phone_two
        );

        DB::table('pickup_point')->where('id', '=',$request->id)->update($data);
        return response()->json('Pickup Point Updated Successfully!');
    }

    public function destroy($id)
    {
        DB::table('pickup_point')->where('id', '=',$id)->delete();
        return response()->json('Pickup Point Deleted!');
    }
}
