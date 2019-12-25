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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login','userController@login');

Route::get('users','userController@index');


Route::get('user/{id}','userController@show');

//create new
Route::post('user','userController@store');

//update
Route::put('users','userController@store');


Route::delete('user/{id}','userController@destroy');


//postconyroller


Route::get('posts','postcontroller@index');


Route::get('post/{id}','postcontroller@show');

//create new
Route::post('post','postcontroller@store');

//update
Route::put('posts','postcontroller@store');


Route::delete('post/{id}','postcontroller@destroy');



