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

Route::get('/games/create', 'GameController@create')->middleware('auth')->name('games.create');
Route::post('/games', 'GameController@store')->middleware('auth')->name('games.store');

Route::get('/games/{id}', 'GameController@show')->name('games.show');

Route::get('/games/{id}/edit', 'GameController@edit')->middleware('auth')->name('games.edit');
Route::put('/games/{id}', 'GameController@update')->middleware('auth')->name('games.update');

Route::delete('/games/{id}', 'GameController@destroy')->middleware('auth')->name('games.destroy');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
