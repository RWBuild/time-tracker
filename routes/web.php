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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//ADMIN ROLE GROUP
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('/dashboard', function() { return view('dashboard')->name('dashboard'); });
});

//OWNER ROLE GROUP 
Route::group(['middleware' => 'is_owner'], function() {
    Route::get('/owner', function() { return 'WELCOME TO THE OWNER PAGE'; })->name('owner'); 
});





    Route::group(['middleware' => 'auth'], function() {    

    //LOGGED IN USER GROUP
    Route::resource('/clients','App\Http\controllers\ClientController');
    Route::resource('/projects','App\Http\controllers\ProjectController');
   
    //TIME-ENTRY ROUTE
    Route::get('/time-entry', function(){ return view('time-entry'); });

    //Route::resource('time-entry', 'App\Http\controllers\TimeEntryController');
    
});

