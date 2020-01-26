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

Route::get('carcrawler', 'Documentation\DocumentationController@index')->name('index');
Route::get('endpoints', 'Documentation\DocumentationController@documentation')->name('endpoints');
Route::get('endpoints/search', 'Documentation\DocumentationController@search')->name('endpoints.search');
Route::get('endpoints/details', 'Documentation\DocumentationController@details')->name('endpoints.details');
