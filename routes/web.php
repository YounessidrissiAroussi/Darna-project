<?php

use App\Http\Controllers\ProfileController;
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
    return view('layout');
});

Route::get('/register',[ProfileController::class , 'create'])->name('login.create');
Route::post('/register',[ProfileController::class , 'storeRegister'])->name('login.create');

Route::get('/login',[ProfileController::class , 'login'])->name('login.check');
Route::post('/login',[ProfileController::class , 'checkLogin'])->name('login.check');

Route::get('/logout',[ProfileController::class , 'logout']);



