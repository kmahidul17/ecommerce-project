<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        ]);

        //query builder

//        $data = array();
//        $data['category_name'] = $request->category_name;
//        $data['category_slug'] = Str::slug($request->category_name, '-');
//        DB::table('categories')->insert($data);

        //Eloquent ORM

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-')
        ]);

        $notification = array('message'=>'Category Added Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id){

//        $data = DB::table('categories')->where('id',$id)->first();
        $data = Category::findorfail($id);
        return response()->json($data);

    }

    public function update(Request $request){

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_slug'] = Str::slug($request->category_name, '-');

        DB::table('categories')->where('id',$request->category_id)->update($data);

//        $category = Category::where('id',$request->id)->first();
//        $category->update([
//            'category_name' => $request->category_name,
//            'category_slug' => Str::slug($request->category_name, '-')
//        ]);

        $notification = array('message'=>'Category Updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);


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


}
