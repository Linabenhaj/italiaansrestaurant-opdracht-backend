<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Models\FaqCategory;
use App\Models\User;
use App\Models\NewsItem;
use App\Models\Pizza;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

use App\Http\Middleware\AdminMiddleware;

// Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PizzaController;

// Homepage
Route::get('/', function () {
    $faqCategories = FaqCategory::with('faqs')->get();
    $users         = User::latest()->take(12)->get();
    $newsItems     = NewsItem::latest()->paginate(3);
    $pizzas        = Pizza::all();

    return view('welcome', compact('faqCategories', 'users', 'newsItems', 'pizzas'));
})->name('home');

// Publieke gebruikersprofielen
Route::get('/users',        [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// FAQ
Route::get('/faq',  [FaqController::class, 'publicIndex'])->name('faq.public');
Route::post('/faq', [FaqController::class, 'submit'])->name('faq.submit');

// Contactformulier
Route::get('/contact',  [ContactController::class, 'show'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Nieuws
Route::get('/nieuws',            [NewsController::class, 'index'])->name('news.index');
Route::get('/nieuws/{newsItem}', [NewsController::class, 'show'])->name('news.show');

// E-mailverificatie
Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function () {
    auth()->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Gast routes (login, register, wachtwoord vergeten)
Route::middleware('guest')->group(function () {
    Route::get('/wachtwoord-vergeten',      [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/wachtwoord-vergeten',     [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-wachtwoord/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-wachtwoord',        [NewPasswordController::class, 'store'])->name('password.update');

    Route::get('/login',    [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',   [LoginController::class, 'login']);
    Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register',[RegisteredUserController::class, 'store']);
});

// Authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/user/edit',    [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update',  [UserController::class, 'update'])->name('user.update');
    Route::get('/dashboard',    [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::post('/orders',           [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders',            [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UserManagementController::class)->names('users')->except('show');
        Route::post('users/{user}/promote', [UserManagementController::class, 'promote'])->name('users.promote');
        Route::post('users/{user}/demote',  [UserManagementController::class, 'demote'])->name('users.demote');

        Route::resource('pizzas', PizzaController::class)->names('pizzas');

        Route::get('orders',            [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}',    [AdminOrderController::class, 'show'])->name('orders.show');
        Route::delete('orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

        Route::resource('news', AdminNewsController::class)->names('news');
        Route::resource('faq-categories', AdminFaqCategoryController::class)->names('faq-categories');
        Route::resource('faq', AdminFaqController::class)->names('faq');

        // Contact inbox
        Route::get('contact/inbox', [AdminContactController::class, 'index'])->name('contact.index');
        Route::get('contact/{id}',     [AdminContactController::class, 'show'])->name('contact.show');
        Route::delete('contact/{id}',  [AdminContactController::class, 'destroy'])->name('contact.destroy');
    });
