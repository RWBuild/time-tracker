<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\ClientController;
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

#Route::post('/clients','App\http\controllers\ClientController@store');
Route::resource('clients','App\Http\Controllers\ClientController');
Route::resource('projects','App\Http\Controllers\ProjectController');
#Route::put('/clients/{client}','App\Http\controllers\ClientController@store');