<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\UserController;

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

Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/loginUser', 'login')->name('loginUser');
    Route::post('/loginUser', 'processLogin')->name('loginUser.process')->middleware('guest');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'processRegister')->name('register.process')->middleware('guest');
    Route::get('/list', [FrontendController::class, 'list'])->name('list')->middleware('auth');
});



Route::get('loginadmin', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware([Authenticate::class])->group(function () {

    Route::controller(DashboardController::class)->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(SpecialistController::class)->prefix('specialists')->name('specialists.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(DoctorController::class)->prefix('doctors')->name('doctors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(HospitalController::class)->prefix('hospitals')->name('hospitals.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(PatientController::class)->prefix('patients')->name('patients.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});
