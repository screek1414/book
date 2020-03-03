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

Route::get('/', function () {
    return view('home.index');
});

Route::get('genres', 'MainController@getGenres');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('back', 'Controller@back');

Route::get('books', 'BookController@index');
Route::get('books/add', 'BookController@index')->middleware('auth');
Route::get('books/edit/{id}', 'BookController@index')->middleware('auth');
Route::get('books/show/{id}', 'BookController@index')->name('book.show');
Route::post('book/items', 'BookController@books');
Route::post('book/search', 'BookController@search');
Route::post('book/store', 'BookController@store');
Route::post('book/show', 'BookController@show');
Route::post('book/edit', 'BookController@edit');
Route::post('book/update', 'BookController@update');
Route::post('book/destroy', 'BookController@destroy');
Route::post('book/create', 'BookController@create');
Route::post('book/search', 'BookController@search');

Route::get('dashboard/users', 'DashboardController@index');
Route::post('dashboard/users/get', 'DashboardController@users');
Route::post('dashboard/users/change', 'DashboardController@changeRole');

