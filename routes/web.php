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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Profiles
Route::get('/meus-dados', 'ProfileController@index')->name('profile.index');
Route::put('/meus-dados', 'ProfileController@update');

Route::middleware(['auth','admin'])->group(function() {

    Route::resource('series','ClassRoomController')->except(['show'])->names('series');
    Route::resource('materias','MaterialsController')->except(['show'])->names('materias');
/*
        // Series
        Route::get('/', 'ClassRoomController@index')->name('series.index');
        Route::get('/novo', 'ClassRoomController@create')->name('series.novo');
        Route::post('/novo', 'ClassRoomController@store');
        Route::get('/{classRoom}/editar', 'ClassRoomController@edit')->name('series.editar');
        Route::put('/{classRoom}/editar', 'ClassRoomController@update');
        Route::delete('/{classRoom}/destroy', 'ClassRoomController@destroy')->name('series.destroy');

        // Materias
        Route::get('/materias', 'MaterialsController@index')->name('materias.index');
        Route::get('/materias/novo', 'MaterialsController@create')->name('materias.novo');
        Route::post('/materias/novo', 'MaterialsController@store');
        Route::get('/materias/{material}/editar', 'MaterialsController@edit')->name('materias.editar');
        Route::put('/materias/{material}/editar', 'MaterialsController@update');
        Route::delete('/materias/{material}/destroy', 'MaterialsController@destroy')->name('materias.destroy');
*/
    // Usuarios
    Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
    Route::get('/usuarios/novo', 'UserController@create')->name('usuarios.novo');
    Route::post('/usuarios/novo', 'UserController@store');
    Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('usuarios.editar');
    Route::put('/usuarios/{user}/editar', 'UserController@update');
    Route::delete('/usuarios/{user}/destroy', 'UserController@destroy')->name('usuarios.destroy');

    // Segmentos
    Route::get('/segmentos', 'CategoryController@index')->name('segmentos.index');
    Route::get('/segmentos/novo', 'CategoryController@create')->name('segmentos.novo');
    Route::post('/segmentos/novo', 'CategoryController@store');
    Route::get('/segmentos/{category}/editar', 'CategoryController@edit')->name('segmentos.editar');
    Route::put('/segmentos/{category}/editar', 'CategoryController@update');
    Route::delete('/segmentos/{category}/destroy', 'CategoryController@destroy')->name('segmentos.destroy');
});



