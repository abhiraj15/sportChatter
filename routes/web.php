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
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@doLogin')->name('dologin');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@doRegister')->name('doRegister');

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::get('posts/show/{id}', 'PostController@show');
Route::get('posts/edit/{id}', 'PostController@edit');