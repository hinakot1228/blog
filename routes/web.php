<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('posts', 'PostController');

// 7つのアクション。
Route::get('/posts', 'PostController@index')->name('posts.index');
// /postsというリクエストがGET送信できた時には、PostController.phpのindexメソッドを起動せよ

// create機能の作り方
// create.blade.phpの見た目を表示するためのルーティング
Route::get('/posts/create', 'PostController@create')->name('posts.create');
// 保存処理
Route::post('/posts', 'PostController@store')->name('posts.store');
// name()メソッド：ルーティングに名前付けしている
// /post post送信の別名は、posts.storeである。

// 詳細機能
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

// 削除機能
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

// 編集機能
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

// 更新処理
Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
