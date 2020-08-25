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

Route::get('/show', function(){
  
    $query = DB::table('shows')->select('title', 'slug', 'description', 'price', 'bookable')->get();

    return $query;
});