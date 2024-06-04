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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

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

// Separate login routes for different user types
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
});

Route::prefix('passager')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('passager.login');
});

Route::prefix('chauffeur')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('chauffeur.login');
});
