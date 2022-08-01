<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])
    ->name('admin.login');

//Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')
//    ->middleware('is_admin');

    Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware' => 'is_admin'],function (){
        Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
        Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
        Route::get('/admin/password/change', 'AdminController@passwordChange')->name('admin.password.change');
        Route::post('/admin/password/update', 'AdminController@passwordUpdate')->name('admin.password.update');

        //category routes

        Route::group(['prefix'=>'category'], function(){
            Route::get('/', 'CategoryController@index')->name('category.index');
            Route::post('/store', 'CategoryController@store')->name('category.store');
            Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
            Route::get('/edit/{id}', 'CategoryController@edit');
            Route::post('/update', 'CategoryController@update')->name('category.update');
        });

        //global routes
        Route::get('/get-child-category/{id}', 'CategoryController@GetChildCategory');

        //warehouse routes

        Route::group(['prefix'=>'warehouse'], function(){
            Route::get('/', 'WarehouseController@index')->name('warehouse.index');
            Route::post('/store', 'WarehouseController@store')->name('warehouse.store');
            Route::get('/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
            Route::get('/edit/{id}', 'WarehouseController@edit');
            Route::post('/update', 'WarehouseController@update')->name('warehouse.update');
        });

        //subcategory routes

        Route::group(['prefix'=>'subcategory'], function(){
            Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
            Route::post('/store', 'SubcategoryController@store')->name('subcategory.store');
            Route::get('/delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete');
            Route::get('/edit/{id}', 'SubcategoryController@edit');
            Route::post('/update', 'SubcategoryController@update')->name('subcategory.update');
        });

        //childcategory routes

        Route::group(['prefix'=>'childcategory'], function(){
            Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
            Route::post('/store', 'ChildcategoryController@store')->name('childcategory.store');
            Route::get('/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.delete');
            Route::get('/edit/{id}', 'ChildcategoryController@edit');
            Route::post('/update', 'ChildcategoryController@update')->name('childcategory.update');
        });

        //Brand routes

        Route::group(['prefix'=>'brand'], function(){
            Route::get('/', 'BrandController@index')->name('brand.index');
            Route::post('/store', 'BrandController@store')->name('brand.store');
            Route::get('/delete/{id}', 'BrandController@destroy')->name('brand.delete');
            Route::get('/edit/{id}', 'BrandController@edit');
            Route::post('/update', 'BrandController@update')->name('brand.update');
        });

        //Product Routes

        Route::group(['prefix'=>'product'], function(){
            Route::get('/', 'ProductController@index')->name('product.index');
            Route::get('/create', 'ProductController@create')->name('product.create');
            Route::post('/store', 'ProductController@store')->name('product.store');
            Route::get('/delete/{id}', 'ProductController@destroy')->name('product.delete');
            Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
           Route::post('/update','ProductController@update')->name('product.update');
            Route::get('/not-featured/{id}', 'ProductController@notFeatured');
            Route::get('/featured/{id}', 'ProductController@featured');
            Route::get('/not-deal/{id}', 'ProductController@notDeal');
            Route::get('/active-deal/{id}', 'ProductController@activeDeal');
            Route::get('/deactive-status/{id}', 'ProductController@deactiveStatus');
            Route::get('/active-status/{id}', 'ProductController@activeStatus');
        });

        //Pickup Point routes

        Route::group(['prefix'=>'pickup-point'], function(){
            Route::get('/', 'PickupController@index')->name('pickuppoint.index');
            Route::post('/store', 'PickupController@store')->name('pickuppoint.store');
            Route::delete('/delete/{id}', 'PickupController@destroy')->name('pickuppoint.delete');
            Route::get('/edit/{id}', 'PickupController@edit');
            Route::post('/update', 'PickupController@update')->name('pickuppoint.update');
        });

        //Coupon routes
        Route::group(['prefix'=>'coupon'], function(){
            Route::get('/', 'CouponController@index')->name('coupon.index');
            Route::post('/store', 'CouponController@store')->name('coupon.store');
            Route::delete('/delete/{id}', 'CouponController@destroy')->name('coupon.delete');
            Route::get('/edit/{id}', 'CouponController@edit');
            Route::post('/update', 'CouponController@update')->name('coupon.update');
        });

        //Coupon routes
        Route::group(['prefix'=>'campaign'], function(){
            Route::get('/', 'CampaignController@index')->name('campaign.index');
            Route::post('/store', 'CampaignController@store')->name('campaign.store');
            Route::get('/delete/{id}', 'CampaignController@destroy')->name('campaign.delete');
            Route::get('/edit/{id}', 'CampaignController@edit');
            Route::post('/update', 'CampaignController@update')->name('campaign.update');
        });
        //__order
        Route::group(['prefix'=>'order'], function(){
            Route::get('/','OrderController@index')->name('admin.order.index');
            // Route::post('/store','CampaignController@store')->name('campaign.store');
            Route::get('/admin/edit/{id}','OrderController@Editorder');
            Route::post('/update/order/status','OrderController@updateStatus')->name('update.order.status');
            Route::get('/view/admin/{id}','OrderController@ViewOrder');
            Route::get('/delete/{id}','OrderController@delete')->name('order.delete');

        });

        //Setting Routes
        Route::group(['prefix'=>'setting'], function(){
            //SEO Routes
            Route::group(['prefix'=>'seo'], function(){
                Route::get('/', 'SettingController@seo')->name('seo.setting');
                Route::post('/update/{id}', 'SettingController@seoUpdate')->name('seo.setting.update');

            });
            //SMTP Routes
            Route::group(['prefix'=>'smtp'], function(){
                Route::get('/', 'SettingController@smtp')->name('smtp.setting');
                Route::post('/update/{id}', 'SettingController@smtpUpdate')->name('smtp.setting.update');
            });

            //Websites Routes
            Route::group(['prefix'=>'website'], function(){
                Route::get('/', 'SettingController@website')->name('website.setting');
                Route::post('/update/{id}', 'SettingController@websiteUpdate')->name('website.setting.update');
            });

            //Page Routes
            Route::group(['prefix'=>'page'], function(){
                Route::get('/', 'PageController@index')->name('page.index');
                Route::get('/create', 'PageController@create')->name('create.page');
                Route::post('/store', 'PageController@store')->name('page.store');
                Route::get('/delete/{id}', 'PageController@destroy')->name('page.delete');
                Route::get('/edit/{id}', 'PageController@edit')->name('page.edit');
                Route::post('/update/{id}', 'PageController@update')->name('page.update');
            });
        });


    });

