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
    return redirect('/chats');
});

Auth::routes();

Route::post('chats/{chat}/messages', 'MessagesController@store')->middleware('auth');
Route::get('chats/{chat}/messages', 'MessagesController@getMessages')->middleware('auth');

Route::resource('chats', 'ChatsController')->middleware('auth');

Route::prefix('chats/{chat}')->group(function () {
    Route::resource('tasks', 'TaskController')->except(['create'])->middleware('auth');
});
