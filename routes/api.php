<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Show;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * @group  Show Display
 *
 * APIs for display show from PID APP
 * @bodyParam  body Need object Show to be used
 * @response  {
 *      "id": 4,
 *      "name": "Le cid",
 *      "slug": "le-cid",
 *      "Description" : "Le Cid est une piece de theatre realiser par .... ",
 *      "price" : "19,5",
 *      "bookable" : "true",
 *      }
 */

Route::get('/show', ['as'=>'API show', 'uses'=>'APIController@localSHow']);
