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

// Route for API
Route::get('/', 'App\Http\Controllers\Api\ApiController@create');
Route::get('/ajax-request', 'App\Http\Controllers\Api\ApiController@store');

//SHOW Route
Route::get('/show/{id}', 'App\Http\Controllers\Api\ApiController@show');

