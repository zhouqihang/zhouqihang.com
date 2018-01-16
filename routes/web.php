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

Route::get('/{menu?}', 'HomeController@index')
    ->name('home')
    ->where(['menu' => '^[0-9]+$']);

Route::get('/content/{article}', 'HomeController@content')
    ->name('content')
    ->where(['article' => '^[0-9]+$']);

Route::post('/star/{article}', 'HomeController@star')
    ->name('star')
    ->where(['article' => '^[0-9]+$']);