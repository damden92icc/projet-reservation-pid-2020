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
 *  Route for guest
 * */


    Route::group(['prefix'=>'/'], function(){
        Route::get('/', ['as'=>'home welcome', 'uses'=>'ShowController@index']);
        Route::get('/home', ['as'=>'home', 'uses'=>'ShowController@index']);
        Route::get('/location', ['as'=>'location listing', 'uses'=>'LocationController@index']);
        Route::get('/artist', ['as'=>'artist listing', 'uses'=>'ArtistController@index']);
    });

        // display artist 

        Route::group(['prefix'=>'artist'], function(){          
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
            Route::get('/{id}', 'LocationController@show')->where(['id'=> '[0-9]+']);
        });
        
        // display show
        Route::group(['prefix'=>'show'], function(){
            Route::get('/', ['as'=>'shows', 'uses'=>'ShowController@index']);

            Route::get('/get-json', ['as'=>'show get json', 'uses'=>'ShowController@datatableJson']);
            Route::get('/{id}', ['as'=>'show', 'uses'=>'ShowController@show'])->where(['id'=> '[0-9]+']);

        });
       
        // display representations
        Route::group(['prefix'=>'representation'], function(){
            Route::get('representation', 'RepresentationController@index');
            Route::get('representation/{id}', 'RepresentationController@show')->where(['id'=> '[0-9]+']);
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
         
        });    

            // adding show
        Route::group(['prefix'=>'/admin/show'], function(){          
            Route::get('/add', ['as'=>'shows add', 'uses'=>'ShowController@create']);
            Route::pOST('/store', ['as'=>'show store', 'uses'=>'ShowController@store']);
        });    


        Route::get('/api-th', ['as'=>'API th listing show', 'uses'=>'APIController@index']);

        Route::group(['prefix'=>'/get-json'], function(){          
            Route::get('/artist', ['as'=>'artist get json', 'uses'=>'ArtistController@datatableJson']);
            Route::get('/artist', ['as'=>'artist select json', 'uses'=>'ArtistController@selectJson']);

            Route::get('/location', ['as'=>'location get json', 'uses'=>'LocationController@datatableJson']);
            Route::get('/location', ['as'=>'location select json', 'uses'=>'LocationController@selectJson']);

            Route::get('/api-th', ['as'=>'API TH json', 'uses'=>'APIController@getData']);
        });    
