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

// Storage link 
Route::get('storage/{path}/{filename}', 'StorageController@index');


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
        Route::get('add', 'AdminNewsController@addShow')->name('news_add');
        Route::post('add', 'AdminNewsController@add')->name('news_add_post');
    });
});