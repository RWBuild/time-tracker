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
Route::group(['middleware'=>'is_admin'], function(){
    Route::get('/dashboard',function() { return view('dashboard')->name('dashobard');});
});
// is_owner
// Route::group(['middleware'=>'is_owner'], function(){
//     Route::get('/dashboard',function() { return view('dashboard')->name('dashobard');});
// });

//LOGGED IN USER GROUP
Route::group(['middleware'=>'auth'], function(){
    Route::resource('/clients','App\Http\Controllers\ClientController');
    Route::resource('/projects','App\Http\Controllers\ProjectController');
});

// Route::group(['middleware'=>'is_user'], function(){
//     // view route
// });

