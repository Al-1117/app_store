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

// Route for API

Route::get('/ajax-request', 'App\Http\Controllers\Api\ApiController@store');
Route::get('/home', 'App\Http\Controllers\Api\ApiController@create');
Route::get('/show/{id}', 'App\Http\Controllers\Api\ApiController@show');
//Route::get('/test', 'App\Http\Controllers\Api\ApiController@controllerMethod');

