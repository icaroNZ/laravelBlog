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
use App\Http\Controllers;

View::share('blog', App\Blog::all());

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::get('/blog/trashed', 'BlogController@trashed');
Route::get('/blog/trashed/{id}/restore', 'BlogController@restore');

Route::get('/blog/{id}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::post('blog/store', 'BlogController@store');
Route::patch('blog/{id}', 'BlogController@update');
Route::patch('blog/{id}', 'BlogController@publish');

Route::delete('blog/{id}', 'BlogController@destroy');
Route::delete('blog/trash/{id}/remove', 'BlogController@removeFromDB');


Route::get('/admin', 'AdminController@index');

Route::resource('/category', 'CategoryController');

Route::resource('/user', 'UserController');


