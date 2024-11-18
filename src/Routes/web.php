<?php

/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

use NINA\Core\Routing\NINARouter;

NINARouter::group(['namespace' => 'Web', 'prefix' => config('app.web_prefix'), 'middleware' => [\NINA\Middlewares\LangRequest::class, \NINA\Middlewares\CheckRedirect::class]], function ($language = 'vi') {
    NINARouter::get('/change-lang/{lang}', function ($lang) {
        if (\Illuminate\Support\Arr::has(config('app.langs'), $lang)) {
            session()->set('locale', $lang);
            app()->make('config')->set('app.seo_default', $lang);
            response()->redirect(url('home', ['language' => $lang]));
        }
    })->name('changelang');

    NINARouter::get('/', 'HomeController@index')->name('home');
    /*     NINARouter::get('/index', 'HomeController@index')->name('index'); */
    NINARouter::post('/load-product/{action}', 'HomeController@ajaxProduct')->name('load-product');
    NINARouter::get('/load-token', 'ApiController@token')->name('token');
    NINARouter::get('/tags-san-pham', 'TagsController@index')->name('tags');
    NINARouter::post('/lien-he-post', 'ContactController@submit')->name('lien-he-post');
    NINARouter::get('/lien-he', 'ContactController@index')->name('lien-he');
    NINARouter::get('/gioi-thieu', 'StaticController@index')->name('gioi-thieu');
    NINARouter::post('/dang-ky-nhan-tin', 'HomeController@letter')->name('letter');

    NINARouter::group(['type' => 'tin-tuc'], function () {
        NINARouter::get('/news', 'NewsController@index')->name('about.en');
        NINARouter::get('/tin-tuc', 'NewsController@index')->name('about.vi');
        NINARouter::get('/丁图克', 'NewsController@index')->name('about.cn');
    });

    // NINARouter::get('/bang-mau', 'PhotoController@index')->name('bang-mau');
    NINARouter::get('/tin-tuc', 'NewsController@index')->name('tin-tuc');
    NINARouter::get('/dich-vu', 'NewsController@index')->name('dich-vu');
    NINARouter::get('/chinh-sach', 'NewsController@index')->name('chinh-sach');

    NINARouter::get('/load-product-list-home', 'HomeController@ajaxProduct')->name('load-product-list-home');
    NINARouter::get('/san-pham', 'ProductController@index')->name('san-pham');
    NINARouter::get('/tim-kiem', 'ProductController@searchProduct')->name('tim-kiem');
    // NINARouter::get('/tim-kiem-goi-y', 'ProductController@suggestProduct')->name('tim-kiem-goi-y');
    // NINARouter::post('/cart/{action}', 'CartController@handle')->name('cart');
    // NINARouter::get('/gio-hang', 'CartController@showcart')->name('giohang');

    NINARouter::post('/comment/{action}', 'CommentController@handle')->name('comment');
    NINARouter::get('/{slug}', 'SlugController@handle')->where(['slug' => '[\w\-\.]+'])->name('slugweb');
});
