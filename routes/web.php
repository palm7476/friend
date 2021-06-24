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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

// Route::post('/registers', function () {
//     return view('register');
// });

Route::post('/register','UserController@register');



Route::get('/items','ItemController@index');

Route::post('/login', 'Auth\LoginController@Login')->name('login');

Route::group(['middleware' => ['auth']],function (){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/create','MainController@create');
    // Route::get('/show','MainController@show');
    Route::get('/search','MainController@search');
    Route::post('/update','MainController@update');
    Route::get('/searchdata','MainController@searchdata');


    Route::post('/createproduct','ProductController@create');
    Route::get('/showproduct','ProductController@show');
    Route::get('/searchproduct','ProductController@search');
    Route::post('/updateproduct','ProductController@update');
    Route::post('/delete','ProductController@delete');
    Route::post('/save','ProductController@save');

    Route::get('/showuserlogin','UserController@show');
    Route::get('/showuser','UserController@showuser');

    Route::get('/showbrand','ItemController@showbrand');
    Route::post('/createbrand','ItemController@createbrand');

    Route::get('/showtype','ItemController@showtype');

    Route::get('/logout','Auth\LoginController@logout');
});