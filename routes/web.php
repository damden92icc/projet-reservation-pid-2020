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
        Route::get('artist', ['as'=>'artists', 'uses'=>'ArtistController@index']);
        Route::get('artist/{id}', ['as'=>'artist details', 'uses'=>'ArtistController@show'])->where(['id'=> '[0-9]+']);
        Route::get('artist/add', ['as'=>'artist add', 'uses'=>'ArtistController@create']);
        Route::post('artist/store', ['as'=>'artist store', 'uses'=>'ArtistController@store']);

        // Display Artist Type
        Route::get('type', 'TypeController@index');
        Route::get('type/{id}', 'TypeController@show');

      

        // display Locality
        Route::get('locality', 'LocalityController@index');
        Route::get('locality/{id}', 'LocalityController@show')->where(['id'=> '[0-9]+']);
        Route::get('locality/add', ['as'=>'locality add', 'uses'=>'LocalityController@create']);
        Route::post('locality/store', ['as'=>'locality store', 'uses'=>'LocalityController@store']);
        Route::get('locality/select-json', ['as'=>'locality select json', 'uses'=>'LocalityController@selectJson']);


        // display Location
        Route::get('location', 'LocationController@index');
        Route::get('location/{id}', 'LocationController@show')->where(['id'=> '[0-9]+']);
        Route::get('location/add', ['as'=>'location add', 'uses'=>'LocationController@create']);
        Route::post('location/store', ['as'=>'location store', 'uses'=>'LocationController@store']);


        // display show
        Route::get('shows', ['as'=>'shows', 'uses'=>'ShowController@index']);
        Route::get('shows/get-json', ['as'=>'shows-json', 'uses'=>'ShowController@indexAjax']);
        Route::get('show/{id}', ['as'=>'show', 'uses'=>'ShowController@show']);
       

        // adding show
        Route::get('add-show', ['as'=>'shows add', 'uses'=>'ShowController@create']);
        Route::patch('add-show-store', ['as'=>'shows adding', 'uses'=>'ShowController@store']);


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

 // Display Profil and update

Route::get('/profil/{user}',  ['as'=>'my profil', 'uses'=>'ProfilController@show']);
Route::get('profil/{user}/edit',  ['as'=>'profil edit', 'uses'=>'ProfilController@edit']);
Route::patch('profil/{user}',  ['as'=>'profil update', 'uses'=>'ProfilController@update']);

/**
 * 
 *  Route for admin
 * */

// display User role
Route::get('role', 'RoleController@index');
Route::get('role/{id}', 'RoleController@show');


