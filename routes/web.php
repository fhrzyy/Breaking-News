<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    
    Route::middleware('role:admin,guru')->group(function () {
        Route::resource('news', NewsController::class);
    });
    
    Route::middleware('role:admin')->group(function () {
        Route::post('news/{news}/approve', [NewsController::class, 'approve'])->name('news.approve');
    });
    Route::get('/settings', [AuthController::class, 'showSettings'])->name('settings');
    Route::put('/settings/profile', [AuthController::class, 'updateProfile'])->name('settings.profile');
    Route::put('/settings/password', [AuthController::class, 'updatePassword'])->name('settings.password');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/faq', fn() => view('faq'))->name('faq');

Route::get('/public-news', [NewsController::class, 'publicIndex'])->name('news.publicIndex');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);