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
	    Route::get('/destroy/{slug}', 'Admin\CateProductController@destroy')->name('admin.cate_product.destroy');
	});
    
});

