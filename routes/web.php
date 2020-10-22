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


Route::get('/games', 'GameController@index')->name('games.index');

Route::get('/games/create', 'GameController@create')->name('games.create');
Route::post('/games', 'GameController@store')->name('games.store');

Route::get('/games/{id}', 'GameController@show')->name('games.show');

Route::get('/games/{id}/edit', 'GameController@edit')->name('games.edit');
Route::put('/games/{id}', 'GameController@update')->name('games.update');

Route::delete('/games/{id}', 'GameController@destroy')->name('games.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
