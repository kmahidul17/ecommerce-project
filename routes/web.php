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

    //review section
    Route::post('/store/review','ReviewController@store')->name('review.store');

    //wishlist
    Route::get('/add/wishlist/{id}','ReviewController@addWishlist')->name('wishlist.add');
});
