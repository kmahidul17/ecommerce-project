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

    Route::get('/cartproduct/remove/{rowId}','CartController@RemoveProduct');
    Route::get('/cartproduct/updateqty/{rowId}/{qty}','CartController@UpdateQty');
    Route::get('/cartproduct/updatecolor/{rowId}/{color}','CartController@UpdateColor');
    Route::get('/cartproduct/updatesize/{rowId}/{size}','CartController@UpdateSize');



    Route::get('/all-cart/view','CartController@allCartView')->name('all.cart.destroy');

    Route::post('/add-to-cart','CartController@addToCartQV')->name('add.to.cart.quickView');

    //review section
    Route::post('/store/review','ReviewController@store')->name('review.store');

    //wishlist
    Route::get('/add/wishlist/{id}','CartController@addWishlist')->name('wishlist.add');
});
