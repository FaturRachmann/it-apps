<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowbiteTestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services.index');
Route::get('/services/{service}', [PageController::class, 'serviceShow'])->name('services.show');
Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');
Route::get('/articles/{article}', [PageController::class, 'articleShow'])->name('articles.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Policies
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/cookie-policy', [PageController::class, 'cookiePolicy'])->name('cookie-policy');

// Test routes
Route::get('/flowbite-test', [FlowbiteTestController::class, 'index']);
Route::get('/test', function () {
    return view('test');
});

// Admin Routes - Protected with auth middleware
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Services Management
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    // Articles Management
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    
    // Messages
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages.index');
    Route::post('/messages/{message}/read', [AdminController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{message}', [AdminController::class, 'destroyMessage'])->name('messages.destroy');
});

// Auth Routes
require __DIR__.'/auth.php';

// User Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.show');
});
