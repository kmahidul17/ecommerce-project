<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCartQV(Request $request): \Illuminate\Http\JsonResponse
    {

        $product = Product::find($request->id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => '1',
            'options' => ['size' => $request->size, 'color' => $request->color, 'thumbnail' => $product->thumbnail]
        ]);

        return response()->json('Product has been added to cart');
    }

    public function allCart(): \Illuminate\Http\JsonResponse
    {
        $data = array();
        $data['cart_qty'] = Cart::count();
        $data['cart_total'] = Cart::total();

        return response()->json($data);
    }


    public function allCartView(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Cart::content());
    }

    public function addWishlist($id){

        if(Auth::check()){
            $wishlist_exist = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();

            if($wishlist_exist){
                $notification = array('message'=>'This product has already been added to the wishlist', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }else{
                Wishlist::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id
                ]);

                $notification = array('message'=>'Product has been added to your wishlist', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
        }
        $notification = array('message'=>'Please Login To Your Account', 'alert-type' => 'error');
        return redirect()->back()->with($notification);

    }

    public function myCart(){
        $content = Cart::content();
        return view('frontend.cart.cart',compact('content'));
    }

    public function RemoveProduct($rowId)
    {
        Cart::remove($rowId);
        return response()->json('Success!');
    }

    public function UpdateQty($rowId,$qty)
    {
        Cart::update($rowId, ['qty' => $qty]);
        return response()->json('Successfully Updated!');
    }

    public function UpdateColor($rowId,$color)
    {
        $product=Cart::get($rowId);
        $thumbnail=$product->options->thumbnail;
        $size=$product->options->size;
        Cart::update($rowId, ['options'  => ['color' => $color , 'thumbnail'=>$thumbnail ,'size'=>$size]]);
        return response()->json('Successfully Updated!');
    }

    public function UpdateSize($rowId,$size)
    {
        $product=Cart::get($rowId);
        $thumbnail=$product->options->thumbnail;
        $color=$product->options->color;
        Cart::update($rowId, ['options'  => ['size' => $size , 'thumbnail'=>$thumbnail ,'color'=>$color]]);
        return response()->json('Successfully Updated!');
    }

    public function EmptyCart()
    {
        Cart::destroy();
        $notification=array('messege' => 'Cart item clear', 'alert-type' => 'success');
        return redirect()->to('/')->with($notification);
    }

}
