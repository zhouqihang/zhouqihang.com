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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/columns/{menu}', 'HomeController@columns')
    ->name('columns')
    ->where(['menu' => '^[0-9]+$']);

Route::get('/content/{article}', 'HomeController@content')
    ->name('content')
    ->where(['article' => '^[0-9]+$']);
