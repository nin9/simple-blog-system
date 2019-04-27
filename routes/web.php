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
    return redirect()->route('PostIndex');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index')->name('PostIndex');
    Route::get('/{id}', 'PostController@view')->name('PostView');
    Route::get('/category/{id}', 'PostController@indexByCategory')->name('CategoryPostIndex');
    Route::post('/{id}/comment', 'PostController@addComment')->name('AddComment');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'Admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('Dashboard');
    
    Route::group(['prefix' => '/posts'], function () {
        Route::get('/', 'PostController@index')->name('PostIndex');
        Route::get('/add', 'PostController@add')->name('AddPost');
        Route::post('/create', 'PostController@create')->name('CreatePost');
        Route::get('/edit/{id}', 'PostController@edit')->name('EditPost');
        Route::put('/update/{id}', 'PostController@update')->name('UpdatePost');
        Route::get('/delete/{id}', 'PostController@delete')->name('DeletePost');
    });

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'CategoryController@index')->name('CategoryIndex');
        Route::get('/add', 'CategoryController@add')->name('AddCategory');
        Route::post('/create', 'CategoryController@create')->name('CreateCategory');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('EditCategory');
        Route::put('/update/{id}', 'CategoryController@update')->name('UpdateCategory');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('DeleteCategory');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
