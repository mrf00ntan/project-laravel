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

Route::get('/', 'HomeController@index')->name('homepage');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Auth::routes();

    Route::get('dashboard', 'AdminController@index')->name('admin_dashboard');
    

    Route::prefix('news')->group(function(){
        // show news
        Route::get('show', 'AdminNewsController@show')->name('news_show');
        // remove news
        Route::get('remove', 'AdminNewsController@remove')->name('news_remove');
        // add news
        Route::get('add', 'AdminNewsController@add')->name('news_add');
    });
});