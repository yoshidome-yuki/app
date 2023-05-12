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
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'PlayerController@index')->name('home');
    Route::resource('players', 'PlayerController', ['only' => [
        'index', 'show','edit','update'
    ]]);
    Route::resource('admins', 'AdminController', ['only' => [
        'index', 'create','store'
    ]]);
    Route::resource('menus', 'MenuController', ['only' => [
        'create', 'store'
    ]]);
    Route::resource('notices', 'NoticeController', ['only' => [
        'create', 'store'
    ]]);
    Route::resource('diaries', 'DiaryController', ['only' => [
        'create', 'show','store','edit','update','destroy'
    ]]);
    Route::resource('comments', 'CommentController', ['only' => [
        'store'
    ]]);
});
