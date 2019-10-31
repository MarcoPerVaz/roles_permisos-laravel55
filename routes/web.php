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

/* Ruta principal antes de loguerase */
Route::get('/', function () {
    return view('welcome');
});

/* Login */
Auth::routes();

/* Ruta principal después de loguearse */
Route::get('/home', 'HomeController@index')->name('home');


