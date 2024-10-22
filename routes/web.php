<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LokersController;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CountController;
use Illuminate\Support\Facades\Auth;

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

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan lowongan kerja dengan pencarian
Route::get('/loker', [HomeController::class, 'indexloker'])->name('awal.home');

// Rute untuk Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Rute untuk menangani proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Rute untuk menangani proses logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/update-view-count', [CountController::class, 'updateViewCount']);
Route::post('/like-website', [CountController::class, 'likeWebsite']);
Route::get('/update-like-count', [CountController::class, 'getLikeCount']);


// Rute Dashboard dan Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rute Data User
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
    });

    // Rute Data Loker
    Route::prefix('lokers')->name('lokers.')->group(function () {
        Route::get('/', [LokersController::class, 'index'])->name('index');
        Route::get('/create', [LokersController::class, 'create'])->name('create');
        Route::post('/', [LokersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [LokersController::class, 'edit'])->name('edit');
        Route::put('/{id}', [LokersController::class, 'update'])->name('update');
        Route::delete('/{id}', [LokersController::class, 'destroy'])->name('destroy');
    });

    // Rute Data Resume
    Route::prefix('resumes')->name('resumes.')->group(function () {
        Route::post('/submit', [ResumesController::class, 'submitResume'])->name('submit');
        Route::get('/', [ResumesController::class, 'index'])->name('index');
        Route::get('/create', [ResumesController::class, 'create'])->name('create');
        Route::post('/', [ResumesController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ResumesController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ResumesController::class, 'update'])->name('update');
        Route::delete('/{id}', [ResumesController::class, 'destroy'])->name('destroy');
    });

    // Rute Data Video
    Route::prefix('videos')->name('videos.')->group(function () {
        Route::get('/', [VideosController::class, 'index'])->name('index');
        Route::get('/create', [VideosController::class, 'create'])->name('create');
        Route::post('/', [VideosController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VideosController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VideosController::class, 'update'])->name('update');
        Route::delete('/{id}', [VideosController::class, 'destroy'])->name('destroy');
    });

    // Rute Data Setting
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::get('/create', [SettingsController::class, 'create'])->name('create');
        Route::post('/', [SettingsController::class, 'store'])->name('store');
        Route::get('/edit', [SettingsController::class, 'edit'])->name('edit');
        Route::put('/update', [SettingsController::class, 'update'])->name('update');
    });
});
