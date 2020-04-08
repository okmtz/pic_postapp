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

Route::get('/', 'HomeController@index');
Route::resource('/community', 'CommunityController');
Route::get('/community', 'CommunityController@index')->name('community');
Route::resource('/post', 'PostController');
Route::get('/post', 'PostController@show')->name('post');
Route::resource('/reply', 'ReplyController');
Auth::routes();



