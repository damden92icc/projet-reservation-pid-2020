<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

/**
 * ==============================
 * Guest routes
 * ==============================
 */




    Route::group(['prefix'=>'/'], function(){
        Route::get('/', ['as'=>'home welcome', 'uses'=>'ShowController@index']);
        Route::get('/home', ['as'=>'home', 'uses'=>'ShowController@index']);
        Route::get('/location', ['as'=>'location listing', 'uses'=>'LocationController@index']);
      

        Route::group(['prefix'=>'artist'], function(){          
            Route::get('/', ['as'=>'artist listing', 'uses'=>'ArtistController@index']);
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

    });

        
/**
 * ==============================
 * Ahtnetficate user routes
 * ==============================
 */

         
        Auth::routes();

        // Display Profil and update
        Route::group(['prefix'=>'profil'], function(){          
            Route::get('/{user}',  ['as'=>'my profil', 'uses'=>'ProfilController@show']);
            Route::get('/{user}/edit',  ['as'=>'profil edit', 'uses'=>'ProfilController@edit']);
            Route::patch('/{user}',  ['as'=>'profil update', 'uses'=>'ProfilController@update']);
        });

        Route::GET('/booking/{id}',  ['as'=>'booking get place', 'uses'=>'RepresentationController@bookingForm'])->where(['id'=> '[0-9]+']);
        Route::POST('/booking',  ['as'=>'booking place', 'uses'=>'RepresentationController@reservationPlace']); 

/**
 * ==============================
 * Admin routes
 * ==============================
 */
    

        Route::group(['prefix'=>'/admin', 'middleware'=>'isAdmin'], function(){    
            
            // Show mangement
            Route::get('show/add', ['as'=>'shows add', 'uses'=>'ShowController@create']);
            Route::get('show/edit/{show_id}', ['as'=>'shows edit', 'uses'=>'ShowController@edit']);
            Route::pOST('show/store', ['as'=>'show store', 'uses'=>'ShowController@store']);

            Route::get('/export-shows', ['as'=>'Export show xls', 'uses'=>'ShowExportController@export']);
             Route::post('/import-shows', ['as'=>'Import show xls', 'uses'=>'ShowsImportController@import']);
            // create representation
            Route::POST('/representation-store', ['as'=>'representation store', 'uses'=>'RepresentationController@store']);


            // Artist management
            Route::group(['prefix'=>'/artist'], function(){          
                Route::get('/add', ['as'=>'artist add', 'uses'=>'ArtistController@create']);
                Route::get('/edit/{artist}', ['as'=>'artist edit', 'uses'=>'ArtistController@edit']);
                Route::post('/update/{artist}', ['as'=>'artist update', 'uses'=>'ArtistController@update']);
                Route::post('/store', ['as'=>'artist store', 'uses'=>'ArtistController@store']);
                Route::post('/store-many', ['as'=>'artist store many', 'uses'=>'ArtistController@storeMany']);
            });
            
            // Role
            Route::group(['prefix'=>'role'], function(){          
                Route::get('/', 'RoleController@index');
                Route::get('/{id}', 'RoleController@show');
            });
            
            // Locality Management
            Route::group(['prefix'=>'/locality'], function(){          
                Route::get('/add', ['as'=>'locality add', 'uses'=>'LocalityController@create']);
                Route::post('locality/store', ['as'=>'locality store', 'uses'=>'LocalityController@store']);
                Route::get('locality/select-json', ['as'=>'locality select json', 'uses'=>'LocalityController@selectJson']);
            }); 

            // Location management
            Route::get('/location/add', ['as'=>'location add', 'uses'=>'LocationController@create']);
            Route::patch('/location/store', ['as'=>'location store', 'uses'=>'LocationController@store']);

            // fetching and storing Theatre C.
            Route::get('/api-th', ['as'=>'API th listing show', 'uses'=>'APIController@index']);
            Route::get('/api-th-single/{showSlug}', ['as'=>'API th single show', 'uses'=>'APIController@displaySingle']);
        });    



        Route::group(['prefix'=>'/get-json'], function(){          
            Route::get('/artist-dt', ['as'=>'artist get json', 'uses'=>'ArtistController@datatableJson']);
            Route::get('/artist', ['as'=>'artist select json', 'uses'=>'ArtistController@selectJson']);

            Route::get('/location-dt', ['as'=>'location get json', 'uses'=>'LocationController@datatableJson']);
            Route::get('/location', ['as'=>'location select json', 'uses'=>'LocationController@selectJson']);


            Route::get('/api-th', ['as'=>'API TH json', 'uses'=>'APIController@getData']);
            Route::get('/api-th-show/{showSlug}', ['as'=>'API th single show js', 'uses'=>'APIController@getSingleShow']);
        });    



      


        // RSS routing ( from Laravel-rss Feed)
        Route::feeds();