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

Route::any('item/{category}/{good}', 'PagesController@getCurrentGood');

Route::match(['get', 'post'], 'item/{category}/{good}/removeCart1', function ($categotu) {
    return "Hello World, $id";
});

Route::get('item/{category}', 'PagesController@getFilteredGood');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'PagesController@search')->name('search');
