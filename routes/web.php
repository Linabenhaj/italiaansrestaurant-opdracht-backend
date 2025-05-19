<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Publieke routes
Route::get('/', function () {
    return view('welcome');
});

// Dashboard alleen voor ingelogde en geverifieerde gebruikers
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes - alleen voor ingelogde admins
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Voorbeeld resource controllers voor admin (nieuws, FAQ, gebruikers)
    Route::resource('admin/nieuws', AdminNewsController::class);
    Route::resource('admin/faq', AdminFaqController::class);
    Route::resource('admin/gebruikers', AdminUserController::class);

    // Contactberichten voor admin
    Route::get('admin/contactberichten', [AdminContactController::class, 'index'])->name('admin.contactberichten.index');
});

// Auth routes (login, register, password resets etc.)
require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
});
Route::get('contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
