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
   if(Auth::User()) {
			return view('logged', ['user'=>Auth::User()]);
		} else
    return view('intro');
});
Route::get('/create', function () {
    if(Auth::User()) {
			return view('create', ['user'=>Auth::User()]);
		} else
    return "Forbidden! you have to login first.";
});
Route::get('/update', function () {
    if(Auth::User()) {
			return view('update', ['user'=>Auth::User()]);
		} else
    return "Forbidden! you have to login first.";
});
Route::get('/update/{article}', 'ArticleController@index0');
Route::get('/delete', function () {
    if(Auth::User()) {
			return view('delete', ['user'=>Auth::User()]);
		} else
    return "Forbidden! you have to login first.";
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
