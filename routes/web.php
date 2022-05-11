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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/perusahaan', 'PerusahaanController'); 

Route::resource('/lamaran', 'LamaranController')->middleware('auth');

Route::resource('/user', 'UserController')->middleware('auth');

Route::get('/penulis', function(){
    return view('penulis');
});

Route::resource('/admin', 'AdminController')->middleware('auth');