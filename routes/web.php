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


Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'Admin\LoginController@postLogin')->name('admin.postLogin');
Route::group(['middleware' => 'adminLogin'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', function () {return view('admin/index');})->name('admin.index');
        Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
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
        Route::group(['prefix' => 'post'], function() {
            Route::get('/', 'Admin\PostController@index')->name('admin.post.index');
            Route::get('/create', 'Admin\PostController@create')->name('admin.post.create');
            Route::post('/create', 'Admin\PostController@postCreate')->name('admin.post.createPost');
            Route::get('/update/{slug}', 'Admin\PostController@update')->name('admin.post.update');
            Route::post('/update/{slug}', 'Admin\PostController@postUpdate')->name('admin.post.postUpdate');
            Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('admin.post.destroy');
        });
        Route::group(['prefix' => 'intro'], function() {
            Route::get('/', 'Admin\IntroController@index')->name('admin.intro.index');
            Route::get('/create', 'Admin\IntroController@create')->name('admin.intro.create');
            Route::post('/create', 'Admin\IntroController@postCreate')->name('admin.intro.createPost');
            Route::get('/update/{id}', 'Admin\IntroController@update')->name('admin.intro.update');
            Route::post('/update/{id}', 'Admin\IntroController@postUpdate')->name('admin.intro.postUpdate');
            Route::get('/destroy/{id}', 'Admin\IntroController@destroy')->name('admin.intro.destroy');
        });
        Route::group(['prefix' => 'support'], function() {
            Route::get('/', 'Admin\SupportController@index')->name('admin.support.index');
            Route::get('/create', 'Admin\SupportController@create')->name('admin.support.create');
            Route::post('/create', 'Admin\SupportController@postCreate')->name('admin.support.createPost');
            Route::get('/update/{id}', 'Admin\SupportController@update')->name('admin.support.update');
            Route::post('/update/{id}', 'Admin\SupportController@postUpdate')->name('admin.support.postUpdate');
            Route::get('/destroy/{id}', 'Admin\SupportController@destroy')->name('admin.support.destroy');
        });
        Route::group(['prefix' => 'banner'], function() {
            Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');
            Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');
            Route::post('/create', 'Admin\BannerController@postCreate')->name('admin.banner.createPost');
            Route::get('/update/{id}', 'Admin\BannerController@update')->name('admin.banner.update');
            Route::post('/update/{id}', 'Admin\BannerController@postUpdate')->name('admin.banner.postUpdate');
            Route::get('/destroy/{id}', 'Admin\BannerController@destroy')->name('admin.banner.destroy');
        });
        Route::group(['prefix' => 'contact'], function() {
            Route::get('/', 'Admin\ContactController@index')->name('admin.contact.index');
            Route::get('/destroy/{id}', 'Admin\ContactController@destroy')->name('admin.contact.destroy');
        });
        Route::group(['prefix' => 'slide'], function() {
            Route::get('/', 'Admin\SlideController@index')->name('admin.slide.index');
            Route::get('/create', 'Admin\SlideController@create')->name('admin.slide.create');
            Route::post('/create', 'Admin\SlideController@postCreate')->name('admin.slide.createPost');
            Route::get('/update/{id}', 'Admin\SlideController@update')->name('admin.slide.update');
            Route::post('/update/{id}', 'Admin\SlideController@postUpdate')->name('admin.slide.postUpdate');
            Route::get('/destroy/{id}', 'Admin\SlideController@destroy')->name('admin.slide.destroy');
        });
        Route::group(['prefix' => 'cate_slide'], function() {
            Route::get('/', 'Admin\CateSlideController@index')->name('admin.cate_slide.home');
            Route::get('/create', 'Admin\CateSlideController@create')->name('admin.cate_slide.create');
            Route::post('/create', 'Admin\CateSlideController@postCreate')->name('admin.cate_slide.createPost');
            Route::get('/update/{id}', 'Admin\CateSlideController@update')->name('admin.cate_slide.update');
            Route::post('/update/{id}', 'Admin\CateSlideController@postUpdate')->name('admin.cate_slide.postUpdate');
            Route::get('/destroy/{id}', 'Admin\CateSlideController@destroy')->name('admin.cate_slide.destroy');
        });
        Route::group(['prefix' => 'administrator'], function() {
            Route::get('/', 'Admin\LoginController@index')->name('admin.administrator.home');
            Route::get('/create', 'Admin\LoginController@create')->name('admin.administrator.create');
            Route::post('/create', 'Admin\LoginController@postCreate')->name('admin.administrator.createPost');
            Route::get('/destroy/{id}', 'Admin\LoginController@destroy')->name('admin.administrator.destroy');
        });
    });
});

Route::get('/', 'Frontend\HomeController@index')->name('index');
Route::get('/product', 'Frontend\ProductController@cateProductLv1')->name('cate_product_lv1');
Route::get('/{id}', 'Frontend\ProductController@product')->name('product');
Route::get('/sanpham/{id}', 'Frontend\ProductController@detailProduct')->name('detail_product');

