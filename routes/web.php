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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Series
Route::get('/series', 'ClassRoomController@index')->name('series.index');
Route::get('/series/novo', 'ClassRoomController@create')->name('series.novo');
Route::post('/series/novo', 'ClassRoomController@store');
Route::get('/series/{classRoom}/editar', 'ClassRoomController@edit')->name('series.editar');
Route::put('/series/{classRoom}/editar', 'ClassRoomController@update');
Route::delete('/series/{classRoom}/destroy', 'ClassRoomController@destroy')->name('series.destroy');

// Materias
Route::get('/materias', 'MaterialsController@index')->name('materias.index');
Route::get('/materias/novo', 'MaterialsController@create')->name('materias.novo');
Route::post('/materias/novo', 'MaterialsController@store');
Route::get('/materias/{material}/editar', 'MaterialsController@edit')->name('materias.editar');
Route::put('/materias/{material}/editar', 'MaterialsController@update');
Route::delete('/materias/{material}/destroy', 'MaterialsController@destroy')->name('materias.destroy');
