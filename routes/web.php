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

//Auth::routes();

Route::get('/', 'XMLParseController@index')->name('xml.index');
Route::post('/parse-xml', 'XMLParseController@store')->name('xml.store');

Route::resource('categories', 'CategoryController');

/*Route::get('categories', 'CategoryController@index')->name('categories.index');
Route::get('categories/{category}/edit', 'CategoryController@index')->name('categories.edit');*/
