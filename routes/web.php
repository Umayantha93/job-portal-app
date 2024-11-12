<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/seeker-register', [UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('/store-seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');

Route::get('/employer-register', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/store-employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/seeker-login', [UserController::class, 'loginSeeker'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
