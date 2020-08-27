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

        Route::group(['prefix'=>'artist'], function(){
            Route::get('/', ['as'=>'artists', 'uses'=>'ArtistController@index']);
            Route::get('/{id}', ['as'=>'artist details', 'uses'=>'ArtistController@show'])->where(['id'=> '[0-9]+']);
        });

        
       // Display Artist Type
          Route::group(['prefix'=>'type'], function(){
                Route::get('/', 'TypeController@index');
                Route::get('/{id}', 'TypeController@show')->where(['id'=> '[0-9]+']);
        });

        // display Locality
        Route::group(['prefix'=>'locality'], function(){
            Route::get('/', ['as'=>'locality listing', 'uses'=>'LocalityController@index']);
            Route::get('/{id}', 'LocalityController@show')->where(['id'=> '[0-9]+']);
        });

        // display Location
        Route::group(['prefix'=>'location'], function(){
            Route::get('/', ['as'=>'location listing', 'uses'=>'LocationController@index']);
            Route::get('/{id}', 'LocationController@show')->where(['id'=> '[0-9]+']);
        });
        
        // display show
        Route::group(['prefix'=>'show'], function(){
            Route::get('/', ['as'=>'shows', 'uses'=>'ShowController@index']);
            Route::get('/get-json', ['as'=>'shows-json', 'uses'=>'ShowController@datatableJson']);
            Route::get('/{id}', ['as'=>'show', 'uses'=>'ShowController@show'])->where(['id'=> '[0-9]+']);
        });
       
        // display representations
        Route::group(['prefix'=>'representation'], function(){
            Route::get('representation', 'RepresentationController@index');
            Route::get('representation/{id}', 'RepresentationController@show')->where(['id'=> '[0-9]+']);
        });
        
          // Display Optional page
        Route::group(['prefix'=>'page'], function(){          
            Route::get('a-propos', ['as'=>'about', 'uses'=>'PagesController@about']);
            Route::get('contact', ['as'=>'contact', 'uses'=>'PagesController@contact']);
        });

    
        Auth::routes();

        // Display Profil and update
    
          Route::group(['prefix'=>'profil'], function(){          
            Route::get('/{user}',  ['as'=>'my profil', 'uses'=>'ProfilController@show']);
            Route::get('/{user}/edit',  ['as'=>'profil edit', 'uses'=>'ProfilController@edit']);
            Route::patch('/{user}',  ['as'=>'profil update', 'uses'=>'ProfilController@update']);
        });

        Route::group(['prefix'=>'role'], function(){          
            Route::get('/', 'RoleController@index');
            Route::get('/{id}', 'RoleController@show');
        });




        /**
         * ==============================
         * Admin routes
         * ==============================
         */


          // CRUD Artist
          Route::group(['prefix'=>'/admin/artist'], function(){          
            Route::get('/add', ['as'=>'artist add', 'uses'=>'ArtistController@create']);
            Route::post('/store', ['as'=>'artist store', 'uses'=>'ArtistController@store']);
            Route::get('/select-json', ['as'=>'artist select json', 'uses'=>'ArtistController@selectJson']);
          
        });
         
        
        // CRUD locality
            Route::group(['prefix'=>'/admin/locality'], function(){          
            Route::get('/add', ['as'=>'locality add', 'uses'=>'LocalityController@create']);
            Route::post('locality/store', ['as'=>'locality store', 'uses'=>'LocalityController@store']);
            Route::get('locality/select-json', ['as'=>'locality select json', 'uses'=>'LocalityController@selectJson']);
        });    

            // CRUD Lcation
        Route::group(['prefix'=>'/admin/location'], function(){          
            Route::get('/add', ['as'=>'location add', 'uses'=>'LocationController@create']);
            Route::patch('/store', ['as'=>'location store', 'uses'=>'LocationController@store']);
            Route::get('/selectJson', ['as'=>'location select json', 'uses'=>'LocationController@selectJson']);
        });    

            // adding show
        Route::group(['prefix'=>'/admin/show'], function(){          
            Route::get('/add', ['as'=>'shows add', 'uses'=>'ShowController@create']);
            Route::pOST('/store', ['as'=>'show store', 'uses'=>'ShowController@store']);
        });    
