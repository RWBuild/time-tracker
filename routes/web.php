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


require __DIR__.'/auth.php';


//admin role group
Route::group(['middleware' => 'is_admin'], function() {

    Route::get('/dashboard',function () {
         return view ('dashboard');})->name('dashboard');
        });

//owner role group
Route::group(['middleware' => 'is_owner'], function() {

    Route::get('/owner-page', function () {
    return 'You are currently on Owner page';
    })->name('owner-page');
});

//logged in user group
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/projects','App\Http\Controllers\ProjectController');
    Route::resource('/clients','App\Http\Controllers\ClientController');
});
