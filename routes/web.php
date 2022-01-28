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

Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/dashboard', function() { return view('dashboard');})->name('dashboard');
});

//IS_OWNER

Route::get('/owner', function() { return 'you are an owner';})->name('owner');


//LOGGED IN USER GROUP
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/clients','App\Http\Controllers\ClientController');
    Route::resource('/projects','App\Http\Controllers\ProjectController');
});
