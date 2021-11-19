<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //category index method

    public function index(){
        $data = DB::table('categories')->get(); //query builder

        return view('admin.category.category.index',compact('data'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
            'icon' => 'required',
        ]);

        //query builder

//        $data = array();
//        $data['category_name'] = $request->category_name;
//        $data['category_slug'] = Str::slug($request->category_name, '-');
//        DB::table('categories')->insert($data);
        $slug = Str::slug($request->category_name, '-');
        $photo = $request->icon;
        $photo_name = $slug.'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(32,32)->save('files/category/'.$photo_name); //Image Intervention


        //Eloquent ORM

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
            'home_page' => $request->home_page,
            'icon' => 'files/category/'.$photo_name,
        ]);

        $notification = array('message'=>'Category Added Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){

//        $data = DB::table('categories')->where('id',$id)->first();
        $data = Category::findorfail($id);
        return view('admin.category.category.edit',compact('data'));

    }

    public function update(Request $request){

        $slug=Str::slug($request->category_name, '-');
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=$slug;
        $data['home_page']=$request->home_page;
        if ($request->icon) {
            if (File::exists($request->old_icon)) {
                unlink($request->old_icon);
            }
            $photo=$request->icon;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(32,32)->save('files/category/'.$photoname);
            $data['icon']='files/category/'.$photoname;
            DB::table('categories')->where('id',$request->id)->update($data);
            $notification=array('message' => 'Category Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['icon']=$request->old_icon;
            DB::table('categories')->where('id',$request->id)->update($data);
            $notification=array('message' => 'Category Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }



    }

    public function destroy($id){

        //query builder
//        DB::table('categories')->where('id',$id)->delete();

        //Eloquent ORM
        $category = Category::find($id);
        $category->delete();


        $notification = array('message'=>'Category Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    //get child category
    public function GetChildCategory($id)
    {

        $data = DB::table('childcategories')->where('subcategory_id', '=', $id)->get();
        return response()->json($data);
    }


}
