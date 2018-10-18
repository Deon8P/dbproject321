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
Route::get('/', 'SessionsController@create');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@storeUserSession');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegistrationsController@index');
Route::post('/register', 'RegistrationsController@storeUser');

Route::get('/home', 'UsersController@home')->name('home');

Route::get('/products', 'ProductsController@index');
Route::post('/products', 'ProductsController@search');

Route::post('/products/save/comparison', 'ProductsController@saveComparison');
