<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Rutas para las recetas siguiendo las buenas practicas propuestas por laravel 
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas','RecetaController@store')->name('receta.store');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('receta.show');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('receta.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('receta.update');
Route::delete('/recetas/{receta}/destroy', 'RecetaController@destroy')->name('receta.destroy');


//Route test
Route::get('/test','RecetaController@test')->name('receta.test');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
