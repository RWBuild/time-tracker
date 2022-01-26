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
<<<<<<< Updated upstream
});
=======
});

// Route::post('/clients', 'App\Http\Controllers\ClientController@store');
// Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('/projects', 'App\Http\Controllers\ProjectsController');
>>>>>>> Stashed changes
