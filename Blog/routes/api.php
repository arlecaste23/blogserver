<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');


Route::group(['middleware' => 'auth:api'], function(){

	Route::post('details', 'UserController@details');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Articles route
*/

Route::get('articles', 'ArticleController@index');
Route::get('articles/update/{article}', 'ArticleController@index0');
Route::get('articles/delete/{article}', 'ArticleController@deletepanel');
Route::get('articles/id/{id}', 'ArticleController@show0');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');
Route::post('logout/{id}',"UserController@logout");
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
