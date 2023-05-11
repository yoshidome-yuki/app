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



Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'PlayerController@index')->name('home');
    Route::resource('players', 'PlayerController');
    Route::resource('admins', 'AdminController');
    Route::resource('menus', 'MenuController');
    Route::resource('notices', 'NoticeController');
    Route::resource('diaries', 'DiaryController');
    Route::resource('comments', 'CommentController');
});
