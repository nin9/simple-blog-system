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

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index')->name('PostsIndex');
    Route::get('/{id}', 'PostController@view')->name('PostsView');
    Route::get('/category/{id}', 'PostController@indexByCategory')->name('CategoryPostsIndex');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'PostController@index')->name('AdminPostsIndex');
    Route::get('/{id}', 'PostController@view')->name('AdminPostsView');
    Route::get('/category/{id}', 'PostController@indexByCategory')->name('AdminCategoryPostsIndex');
});