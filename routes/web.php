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

// TODO: Try to keep these route files clean.
// If you are not using a route, delete it, do not comment it out

//Route::post('/client','App\Http\controllers\ClientController@store');
Route::resource('/clients','App\Http\controllers\ClientController');
Route::resource('/projects','App\Http\controllers\ProjectController');

//Route::put('/client/{client}','App\Http\controllers\ClientController@update');