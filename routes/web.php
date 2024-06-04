<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
});

Route::prefix('chauffeur')->middleware('auth', 'role:chauffeur')->group(function () {
    Route::get('/home', [ChauffeurController::class, 'index'])->name('chauffeur.home');
});

Route::prefix('passager')->middleware('auth', 'role:passager')->group(function () {
    Route::get('/home', [PassagerController::class, 'index'])->name('passager.home');
});
