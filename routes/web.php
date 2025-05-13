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
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/faq', fn() => view('faq'))->name('faq');

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);