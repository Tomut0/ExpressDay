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

Route::get('/', 'PagesController@index');

Route::get('item/{category}/{good}', 'PagesController@getCurrentGood');

Route::get('item/{category}', 'PagesController@getAllGoods');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'PagesController@search')->name('search');
