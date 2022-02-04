<?php

use App\Models\Project;
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

require __DIR__ . '/auth.php';

// ADMIN ROLE GROUP
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'is_owner'], function () {
    Route::get('/owner', function () {
        return 'you are an owner';
    })->name('owner');
});

// LOGGED IN USER GROUP
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/clients', 'App\Http\Controllers\ClientController');
    Route::resource('/projects', 'App\Http\Controllers\ProjectController');
    
    // Time Entry Routes
    Route::get('/time-entries/searchByDate', 'App\Http\Controllers\TimeEntryController@searchByDate')->name('searchByDate');
    Route::get('/time-entries/getClientsProjects/{id}', 'App\Http\Controllers\TimeEntryController@getClientsProjects')->name('getClientsProjects');
    Route::resource('/time-entries', 'App\Http\Controllers\TimeEntryController');
});