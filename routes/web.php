<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');

// Route for displaying projects by category
Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->name('category.show');

// Projects management routes (skyddade med auth)
Route::resource('projects', ProjectController::class)->only(['show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('categories', CategoryController::class);
});


// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
