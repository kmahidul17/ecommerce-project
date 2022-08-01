<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class IndexControlller extends Controller
{
    public function index(){

        $category = Category::orderBy('category_name', 'ASC')->get();
        $slider_product = Product::where('status',1)->where('product_slider',1)->latest()->first();
        $featured_product = Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(16)->get();
        $today_deal = Product::where('status',1)->where('today_deal',1)->orderBy('id','DESC')->limit(6)->get();
        $popular_product = Product::where('status',1)->orderBy('product_views','DESC')->limit(16)->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        $trendy_product = Product::where('status',1)->where('trendy',1)->orderBy('id','DESC')->limit(16)->get();
        $home_category = Category::where('home_page',1)->orderBy('category_name','ASC')->get();
        $brand = Brand::inRandomOrder()->limit(12)->get();
        return view('frontend.index',compact('category','slider_product','featured_product',
                    'popular_product','trendy_product','home_category','brand','random_product','today_deal'));
    }

    public function productDetails($slug){

        $product = Product::where('slug',$slug)->first();
        $product_views = Product::where('slug',$slug)->increment('product_views');
        $related_product = Product::where('subcategory_id',$product->subcategory_id)
                                    ->orderBy('id','DESC')->take(10)->get();
        $review = Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();

        return view ('frontend.product.product_details',compact('product','related_product','review'));
    }

    public function productQuickView($id){
        $product = Product::where('id',$id)->first();
//        return response()->json(array($product));
        return view('frontend.product.quick_view', compact('product'));
    }

    public function categoryWiseProduct($category_slug){
        $category = Category::where('category_slug',$category_slug)->first();
//        dd($category->id);
        $subcategory = Subcategory::where('category_id',$category->id)->get();
        $brand = Brand::all();
        $products = Product::where('category_id',$category->id)->paginate(20);
        $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();

        return view('frontend.product.category_product',compact('category','subcategory','brand','products','random_product'));
    }

    //constact page
    public function Contact()
    {
        return view('frontend.contact');
    }
}
