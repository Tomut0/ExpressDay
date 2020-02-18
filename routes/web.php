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

Route::any('/', 'PagesController@index');

Route::any('item/{category}/{good}', 'PagesController@getCurrentGood');

Route::any('/remove/{id}', 'PagesController@removeCart');

Route::any('item/{category}', 'PagesController@getFilteredGood');

Auth::routes();

Route::any('/home', 'HomeController@index')->name('home');

Route::any('/search', 'PagesController@search');
