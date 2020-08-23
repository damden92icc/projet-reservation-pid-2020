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



/**
 * 
 *  Route for non logged user
 * */

Route::get('/', function () {
    return view('welcome');
});

        Route::get('/home', 'HomeController@index')->name('home');


        // display artist 
        Route::get('artists', ['as'=>'artists', 'uses'=>'ArtistController@index']);
        Route::get('artist/{id}}', ['as'=>'artist', 'uses'=>'ArtistController@show']);


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
        Route::get('show', ['as'=>'shows', 'uses'=>'ShowController@index']);
        Route::get('show/{id}', ['as'=>'show', 'uses'=>'ShowController@show']);
       


        // display representations
        Route::get('representation', 'RepresentationController@index');
        Route::get('representation/{id}', 'RepresentationController@show');

        // Display Optional page
        Route::get('a-propos', ['as'=>'about', 'uses'=>'PagesController@about']);
        Route::get('contact', ['as'=>'contact', 'uses'=>'PagesController@contact']);

        Auth::routes();


/**
 * 
 *  Route for logged user
 * */


/**
 * 
 *  Route for admin
 * */

// display User role
Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');


