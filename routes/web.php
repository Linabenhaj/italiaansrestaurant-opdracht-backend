<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\FaqCategory;

Route::get('/', function () {
    $faqCategories = FaqCategory::with('faqs')->get();
    return view('welcome', compact('faqCategories'));
});

// Route voor registratie
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);

// Routes die alleen toegankelijk zijn voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{username}', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route voor FAQ formulier versturen
Route::post('/faq/submit', function(Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'question' => 'required|string|max:1000',
    ]);

    // Hier kun je opslaan of mail sturen
    return redirect('/')->with('success', 'Bedankt voor je vraag!');
})->name('faq.submit');

// Overige routes
Route::get('/menu', function () {
    return view('menu');  
});

Route::resource('news', NewsItemController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Laad extra auth routes (zoals login, logout)
require __DIR__.'/auth.php';