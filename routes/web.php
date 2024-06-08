<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
});

// Chauffeur routes
Route::prefix('chauffeur')->middleware(['auth', 'role:chauffeur'])->group(function () {
    Route::get('/home', [ChauffeurController::class, 'index'])->name('chauffeur.home');
});

// Passager routes
Route::prefix('passager')->middleware(['auth', 'role:passager'])->group(function () {
    Route::get('/home', [PassagerController::class, 'index'])->name('passager.home');
});


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
  
 
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/chauffeur/home', [ChauffeurController::class, 'index'])->name('chauffeur.home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});