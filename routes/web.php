<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Home and project routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [ProjectController::class, 'byCategory'])->name('category.show');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes (protected)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
});