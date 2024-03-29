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

/* Rutas para permisos */
    /* Roles */
        Route::middleware( [ 'auth' ] )->group(function () {
            
            Route::resource( 'roles', 'RoleController' );

        });
    /*  */
    /* Products */
        Route::middleware( [ 'auth' ] )->group(function () {
            
            Route::post( 'products/store', 'ProductController@store' )->name( 'products.store' )
                ->middleware( 'permission:products.create' );

            Route::get( 'products', 'ProductController@index' )->name( 'products.index' )
                ->middleware( 'permission:products.index' );

            Route::get( 'products/create', 'ProductController@create' )->name( 'products.create' )
                ->middleware( 'permission:products.create' );

            Route::put( 'products/{product}', 'ProductController@update' )->name( 'products.update' )
                ->middleware( 'permission:products.edit' );

            Route::get( 'products/{product}', 'ProductController@show' )->name( 'products.show' )
                ->middleware( 'permission:products.show' );

            Route::delete( 'products/{product}', 'ProductController@destroy' )->name( 'products.destroy' )
                ->middleware( 'permission:products.destroy' );

            Route::get( 'products/{product}/edit', 'ProductController@edit' )->name( 'products.edit' )
                ->middleware( 'permission:products.edit' );

        });
    /*  */
    /* Users */
        Route::middleware( [ 'auth' ] )->group(function () {

            Route::get( 'users', 'UserController@index' )->name( 'users.index' )
                ->middleware( 'permission:users.index' );

            Route::put( 'users/{user}', 'UserController@update' )->name( 'users.update' )
                ->middleware( 'permission:users.edit' );

            Route::get( 'users/{user}', 'UserController@show' )->name( 'users.show' )
                ->middleware( 'permission:users.show' );

            Route::delete( 'users/{user}', 'UserController@destroy' )->name( 'users.destroy' )
                ->middleware( 'permission:users.destroy' );

            Route::get( 'users/{user}/edit', 'UserController@edit' )->name( 'users.edit' )
                ->middleware( 'permission:users.edit' );

        });
    /*  */


