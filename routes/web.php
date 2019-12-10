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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/chats', 'ChatsController@store')->middleware('auth');
Route::get('/chats/create', 'ChatsController@create')->middleware('auth');
Route::get('chats/{chat}', 'ChatsController@index')->middleware('auth');

Route::post('chats/{chat}/messages', 'MessagesController@store')->middleware('auth');
Route::get('chats/{chat}/messages', 'MessagesController@getMessages')->middleware('auth');

//Route::resource('chats', 'ChatsController')->middleware('auth');
