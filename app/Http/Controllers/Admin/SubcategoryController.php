<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = DB::table('subcategories')->leftJoin('categories','subcategories.category_id','=','categories.id')
            ->select('subcategories.*','categories.category_name')->get();
        $category = Category::all();

        return view ('admin.category.subcategory.index',compact('data','category'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        //query builder

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['subcat_slug'] = Str::slug($request->subcategory_name, '-');
        DB::table('subcategories')->insert($data);

//        dd($data);

        //Eloquent ORM

//        Category::insert([
//            'category_name' => $request->category_name,
//            'category_slug' => Str::slug($request->category_name, '-')
//        ]);

        $notification = array('message'=>'Subcategory Added Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        $notification = array('message'=>'Subcategory Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function edit($id){

        //Eloquent ORM
        $data = Subcategory::find($id);
        $category  = Category::all();

        //Query Builder
//        $data = Subcategory::find($id);
//        $category = DB::table('categories')->get();

        return view('admin.category.subcategory.edit',compact('data','category'));
    }

    public function update(Request $request){

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['subcat_slug'] = Str::slug($request->subcategory_name, '-');
        DB::table('subcategories')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Subcategory Updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
