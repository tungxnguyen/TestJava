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

Route::get('/trangchu', function () {
    return view('welcome');
});

Route::get('/',['as'=>'home','uses'=>'HomeController@home']);

Route::post('/login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('/login',['as'=>'getLogin','uses'=>'LoginController@getLogin']);

Route::post('/register',['as'=>'postRegister','uses'=>'RegisterController@postRegister']);
Route::get('/register',['as'=>'getRegister','uses'=>'RegisterController@getRegister']);


Route::get('/logout',['as'=>'logout','uses'=>'LoginController@postLogout']);