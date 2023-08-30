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

Route::get('/register',[ProfileController::class , 'create'])->name('login.create');
Route::post('/register',[ProfileController::class , 'storeRegister'])->name('login.create');

Route::get('/login',[ProfileController::class , 'login'])->name('login.check');
Route::post('/login',[ProfileController::class , 'checkLogin'])->name('login.check');

Route::get('/logout',[ProfileController::class , 'logout']);
Route::get('/Profile',[ProfileController::class , 'Profile']);
Route::get('/Setting',[ProfileController::class , 'profileSetting']);
Route::delete('/delete/{id}',[ProfileController::class , 'profileDelete']);
Route::put('/update/{id}',[ProfileController::class , 'update']);

Route::post('/publish',[PublicationController::class , 'store']);









