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

// display Location
Route::get('location', 'LocationController@index');
Route::get('location/{id}', 'LocationController@show');

// display show
Route::get('show', 'ShowController@index');
Route::get('show/{id}', 'ShowController@show');

/**
 * 
 *  Route for logged user
 * */
Route::get('profil', 'ProfilController@index');


// display representations
Route::get('representation', 'RepresentationController@index');
Route::get('representation/{id}', 'RepresentationController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
