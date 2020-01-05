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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'Articlecontroller@create')->name('create');
Route::post('/create', 'Articlecontroller@store')->name('store');

Route::get('/index', 'Articlecontroller@index')->name('index');

Route::get('/display', 'Articlecontroller@display')->name('display');

Route::get('delete/{id}', 'Articlecontroller@destroy')->name('destroy');

Route::get('article/edit/{id}', 'Articlecontroller@edit')->name('Article.edit');
Route::post('article/update/{id}', 'Articlecontroller@update')->name('Article.update');

//Route::resource('Article', 'Articlecontroller');

Route::get('/search','Articlecontroller@search')->name('search');



Route::group(['middleware' => 'roles', 'roles' => ['Admin']],function (){
    Route::get('/admin','UserController@admin')->name('admin');
    Route::post('/add-role','UserController@addRole')->name('add.role');
    Route::get('/statistics','Articlecontroller@statistics')->name('statistics');
    Route::post('/setting','UserController@setting')->name('setting');

});

//Route::group(['middleware' => 'roles', 'roles' => ['Admin','User']],function (){
//
//
//});
Route::get('/like','Articlecontroller@like')->name('like');


//Route::get('/admin',[
//    'uses' => 'UserController@admin',
//    'as' => 'admin',
//    'middleware' => 'roles',
//    'roles' => ['admin','editor'],
//]);
//
//
//Route::post('/add-role',[
//    'uses' => 'UserController@addRole',
//    'as' => 'add.role',
//    'middleware' => 'roles',
//    'roles' => ['admin']
//    ]);




//php -S localhost:8000 -t public
