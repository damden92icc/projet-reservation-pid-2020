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

// display artist 
Route::get('artist', 'ArtistController@index');
Route::get('artist/{id}', 'ArtistController@show');

// display User role
Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');

// Display Artist Type
Route::get('type', 'TypeController@index');
Route::get('type/{id}', 'TypeController@show');

// display Locality
Route::get('locality', 'LocalityController@index');
Route::get('locality/{id}', 'LocalityController@show');