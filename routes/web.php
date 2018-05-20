<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin/index');
})->name('admin.index');
Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'cate_product'], function() {
	    Route::get('/', 'Admin\CateProductController@index')->name('admin.cate_product.home');
	    Route::get('/create', 'Admin\CateProductController@create')->name('admin.cate_product.create');
	    Route::post('/create', 'Admin\CateProductController@postCreate')->name('admin.cate_product.createPost');
	    Route::get('/update/{slug}', 'Admin\CateProductController@update')->name('admin.cate_product.update');
	    Route::post('/update/{slug}', 'Admin\CateProductController@postUpdate')->name('admin.cate_product.postUpdate');
	    Route::get('/destroy/{id}', 'Admin\CateProductController@destroy')->name('admin.cate_product.destroy');
	});
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'Admin\ProductController@index')->name('admin.product.index');
        Route::get('/create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('/create', 'Admin\ProductController@postCreate')->name('admin.product.createPost');
        Route::get('/update/{slug}', 'Admin\ProductController@update')->name('admin.product.update');
        Route::post('/update/{slug}', 'Admin\ProductController@postUpdate')->name('admin.product.postUpdate');
        Route::get('/destroy/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
    });
    Route::group(['prefix' => 'cate_post'], function() {
        Route::get('/', 'Admin\CatePostController@index')->name('admin.cate_post.home');
        Route::get('/create', 'Admin\CatePostController@create')->name('admin.cate_post.create');
        Route::post('/create', 'Admin\CatePostController@postCreate')->name('admin.cate_post.createPost');
        Route::get('/update/{slug}', 'Admin\CatePostController@update')->name('admin.cate_post.update');
        Route::post('/update/{slug}', 'Admin\CatePostController@postUpdate')->name('admin.cate_post.postUpdate');
        Route::get('/destroy/{id}', 'Admin\CatePostController@destroy')->name('admin.cate_post.destroy');
    });

});

