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
Route::prefix('admin')->middleware(['auth', 'role
'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/chauffeurs/create', [AdminController::class, 'createChauffeur'])->name('admin.chauffeurs.create');


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
    Route::get('passager/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');

use App\Http\Controllers\ReviewController;

Route::get('/', [ReviewController::class, 'index']);

Route::get('/reviews', [ReviewController::class, 'all'])->name('Allreviews');

Route::get('/admin/chauffeurs', [AdminController::class, 'allChauffeurs'])->name('admin.chauffeurs');
Route::delete('/admin/chauffeurs/{id}', [AdminController::class, 'deleteChauffeur'])->name('admin.chauffeurs.delete');
// Route to show the form to edit a chauffeur
Route::get('/admin/chauffeurs/{id}/edit', [AdminController::class, 'editChauffeur'])->name('admin.chauffeurs.edit');

// Route to update a chauffeur
Route::put('/admin/chauffeurs/{id}', [AdminController::class, 'updateChauffeur'])->name('admin.chauffeurs.update');
Route::get('/passager/profil', [PassagerController::class, 'profil'])->name('passager.profil');
Route::get('/admin/chauffeurs/{id}', [AdminController::class, 'viewChauffeur'])
     ->name('admin.chauffeurs.view');

 

Route::get('/admin/chauffeurs/{id}/affecter-taxi', [AdminController::class, 'affecterTaxiForm'])->name('admin.chauffeurs.affecter-taxi');

// routes/web.php

Route::post('/admin/chauffeurs/{id}/affecter-taxi', [AdminController::class, 'storeTaxiAssignment'])->name('admin.chauffeurs.affecter-taxi.store');





Route::get('admin/chauffeurs/create', [AdminController::class, 'createChauffeur'])->name('admin.chauffeurs.create');

 

Route::post('/admin/chauffeurs', [AdminController::class, 'storeChauffeur'])->name('admin.chauffeurs.store');

use App\Http\Controllers\ReservationController;

Route::post('/passager/reservation', [ReservationController::class, 'store'])->name('passager.reservation');
Route::get('/passager/reservations', [PassagerController::class, 'reservations'])->name('passager.reservations');
Route::delete('/passager/reservations/{id}/cancel', [PassagerController::class, 'cancelReservation'])->name('passager.cancelReservation');
Route::post('/passager/reservations/{id}/terminercourse', [PassagerController::class, 'terminercourse'])->name('passager.terminercourse');
Route::get('/passager/LaisserAvis', [PassagerController::class, 'LaisserAvis'])->name('passager.avis');
Route::post('/passager/LaisserAvis/create', [PassagerController::class, 'storeAvis'])->name('passager.storeAvis');


Route::get('/chauffeur/home', [ChauffeurController::class, 'index'])->name('chauffeur.home');
Route::post('/chauffeur/prendre-course/{reservation_id}', [ChauffeurController::class, 'prendreCourse'])->name('chauffeur.prendrecourse');
Route::get('/chauffeur/mes-courses', [ChauffeurController::class, 'mesCourses'])->name('chauffeur.mes_courses');
Route::get('/chauffeur/profil', [ChauffeurController::class, 'profil'])->name('chauffeur.profil');
