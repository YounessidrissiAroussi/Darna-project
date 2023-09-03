<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('partials.publication');
});




Route::controller(ProfileController::class)->group(function () {
    Route::get('/register','create')->name('login.create');
    Route::post('/register','storeRegister')->name('login.create');
    Route::get('/login','login')->name('login.check');
    Route::post('/login','checkLogin')->name('login.check');
    Route::get('/logout','logout');
    Route::get('/Profile', 'Profile');
    Route::get('/Setting', 'profileSetting');
    Route::delete('/deleteProfile/{id}', 'profileDelete');
    Route::put('/updateProfile/{id}', 'update');
});

Route::controller(PublicationController::class)->group(function () {
    Route::get('/create','create');
    Route::post('/publish','store');
    Route::delete('/delete/{id}','destroy');
    Route::get('/{id}/edit','edit');
    Route::get('/{id}/show','show');
    Route::patch('/hide/{id}', 'hide');
    Route::patch('/pub/{id}','pub');
    Route::put('/update/{id}', 'update');
});
