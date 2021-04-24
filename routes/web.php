<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\\Http\\Controllers\\InicioController@index')->name('inicio.index');

Route::get('/obras', 'App\\Http\\Controllers\\ObraController@index')->name("obras.index");

Route::get('/contactanos', 'App\\Http\\Controllers\\ContactanosController@index')->name('contactanos.index');
Route::post('/contactanos', 'App\\Http\\Controllers\\ContactanosController@store')->name('contactanos.store');

Route::get('/nosotros', 'App\\Http\\Controllers\\NosotrosController@index')->name('nosotros.index');

Route::get('/recetas', 'App\\Http\\Controllers\\RecetaController@index')->name("recetas.index");
Route::get('/recetas/create', 'App\\Http\\Controllers\\RecetaController@create')->name("recetas.create");
Route::post('/recetas', 'App\\Http\\Controllers\\RecetaController@store')->name("recetas.store");
Route::get('/recetas/{receta}', 'App\\Http\\Controllers\\RecetaController@show')->name("recetas.show"); 
Route::get('/recetas/{receta}/edit', 'App\\Http\\Controllers\\RecetaController@edit')->name("recetas.edit"); 
Route::put('/recetas/{receta}', 'App\\Http\\Controllers\\RecetaController@update')->name("recetas.update"); 
Route::delete('/recetas/{receta}', 'App\\Http\\Controllers\\RecetaController@destroy')->name("recetas.destroy"); 

Route::get('/blogs', 'App\\Http\\Controllers\\BlogController@index')->name("blogs.index");
Route::get('/blogs/create', 'App\\Http\\Controllers\\BlogController@create')->name("blogs.create");
Route::post('/blogs', 'App\\Http\\Controllers\\BlogController@store')->name("blogs.store");
Route::get('/blogs/{blog}', 'App\\Http\\Controllers\\BlogController@show')->name("blogs.show"); 
Route::get('/blogs/{blog}/edit', 'App\\Http\\Controllers\\BlogController@edit')->name("blogs.edit"); 
Route::put('/blogs/{blog}', 'App\\Http\\Controllers\\BlogController@update')->name("blogs.update"); 
Route::delete('/blogs/{blog}', 'App\\Http\\Controllers\\BlogController@destroy')->name("blogs.destroy"); 

//Route::get('/recetas', 'App\\Http\\Controllers\\RecetaController'); Así se declara con nombre completo del controller
Auth::routes();

 