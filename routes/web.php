<?php

use Illuminate\Support\Facades\Route;


Route::get('/login',function(){
    return redirect()->to('/');
})->name('login');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');

//Frontend Routes--------------------

Route::group(['namespace'=>'App\Http\Controllers\Front'],function (){
    Route::get('/','IndexControlller@index');
    Route::get('/product-details/{slug}','IndexControlller@productDetails')->name('product.details');

    Route::get('/product-quick-view/{id}','IndexControlller@productQuickView');

    //Cart Routes
    Route::get('/all-cart','CartController@allCart')->name('all.cart');
    Route::get('/my-cart','CartController@myCart')->name('cart');
    Route::get('/cart/empty','CartController@EmptyCart')->name('cart.empty');
    Route::get('/checkout','CheckoutController@Checkout')->name('checkout');
    Route::post('/apply/coupon','CheckoutController@ApplyCoupon')->name('apply.coupon');
    Route::get('/remove/coupon','CheckoutController@RemoveCoupon')->name('coupon.remove');
    Route::post('/order/place','CheckoutController@OrderPlace')->name('order.place');


    Route::get('/cartproduct/remove/{rowId}','CartController@RemoveProduct');
    Route::get('/cartproduct/updateqty/{rowId}/{qty}','CartController@UpdateQty');
    Route::get('/cartproduct/updatecolor/{rowId}/{color}','CartController@UpdateColor');
    Route::get('/cartproduct/updatesize/{rowId}/{size}','CartController@UpdateSize');



    Route::get('/all-cart/view','CartController@allCartView')->name('all.cart.destroy');

    Route::post('/add-to-cart','CartController@addToCartQV')->name('add.to.cart.quickView');

    //review section
    Route::post('/store/review','ReviewController@store')->name('review.store');

    //wishlist
    Route::get('/wishlist','CartController@wishlist')->name('wishlist');
    Route::get('/add/wishlist/{id}','CartController@addWishlist')->name('wishlist.add');
    Route::get('/clear/wishlist','CartController@clearWishlist')->name('wishlist.clear');
    Route::get('/wishlist/product/delete/{id}','CartController@wishlistProductDelete')->name('wishlistproduct.delete');

    //category wise product
    Route::get('/category/product/{category_slug}','IndexControlller@categoryWiseProduct')->name('categoryWise.product');

    //contact
    Route::get('/contact-us','IndexControlller@Contact')->name('contact');
});
