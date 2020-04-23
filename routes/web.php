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

Route::get('/posts', 'PostController@index');
Route::get('/new', 'PostController@new');
Route::post('/store', 'PostController@store');
Route::get('/show/{id}', 'PostController@show');
Route::delete('/post/{id}', 'PostController@destroy');
Route::get('/post/{id}/edit', 'PostController@edit');
Route::patch('post/update', 'PostController@update')->name('post.update');

Route::post('/store/comment', 'CommentController@store');
Route::delete('/comment/{id}', 'CommentController@destroy');
Route::patch('comment/update', 'CommentController@update')->name('comment.update');	

