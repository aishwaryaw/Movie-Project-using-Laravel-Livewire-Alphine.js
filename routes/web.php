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

//for livewire and component
Route::get('/', function () {
    return view('movies.index');
})->name('movies.index');

//for normal controller path use below route
// Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('movie/{movie}', 'MoviesController@show')->name('movies.show');


Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('actor/{actor}', 'ActorsController@show')->name('actors.show');
Route::get('/actors/page/{page?}', 'ActorsController@index');



//for livewire and component
Route::get('/tv', function () {
    return view('TVShows.index');
})->name('TVShows.index');

//for infinite scrolling
Route::get('/tv/page/{page?}', 'TVController@index');

//for normal controller path use below route
// Route::get('/tv', 'TVController@index')->name('TVShows.index');
Route::get('tv/{show}', 'TVController@show')->name('TVShows.show');
