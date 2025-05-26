<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\FaqCategory;
use App\Models\User;
use App\Models\NewsItem;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;



// Auth-controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Front-end controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

// Admin middleware
use App\Http\Middleware\AdminMiddleware;

// Admin controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\ContactController   as AdminContactController;
use App\Http\Controllers\Admin\OrderController     as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Publieke homepage
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $faqCategories = FaqCategory::with('faqs')->get();
    $users         = User::latest()->take(12)->get();
    $newsItems     = NewsItem::latest()->paginate(3);

    return view('welcome', compact('faqCategories', 'users', 'newsItems'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Publieke FAQ & Contact
|--------------------------------------------------------------------------
*/
Route::get('/faq',         [FaqController::class,    'publicIndex'])->name('faq.public');
Route::post('/faq/submit', [FaqController::class,    'submit'])     ->name('faq.submit');

Route::get('/contact',     [ContactController::class,'show'])       ->name('contact.form');
Route::post('/contact',    [ContactController::class,'submit'])     ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Publieke Nieuws
|--------------------------------------------------------------------------
*/
Route::get('/nieuws',            [NewsController::class, 'index'])->name('news.index');
Route::get('/nieuws/{newsItem}', [NewsController::class, 'show']) ->name('news.show');

/*
|--------------------------------------------------------------------------
| Publieke Profielen
|--------------------------------------------------------------------------
*/
Route::get('/profielen',        [UserController::class,'index'])->name('profiles.index');
Route::get('/profielen/{user}', [UserController::class,'show']) ->name('profiles.show');
// Vergeten wachtwoord (NL route)
Route::get('/wachtwoord-vergeten', [PasswordResetLinkController::class, 'create'])
     ->middleware('guest')
     ->name('password.request');

Route::post('/wachtwoord-vergeten', [PasswordResetLinkController::class, 'store'])
     ->middleware('guest')
     ->name('password.email');

Route::get('/reset-wachtwoord/{token}', [NewPasswordController::class, 'create'])
     ->middleware('guest')
     ->name('password.reset');

Route::post('/reset-wachtwoord', [NewPasswordController::class, 'store'])
     ->middleware('guest')
     ->name('password.update');

Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',[RegisteredUserController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function() {
    Route::get('/dashboard',    [UserController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/profile',      [UserController::class,'profile'])      ->name('profile.show');
    Route::get('/profile/edit', [UserController::class,'edit'])         ->name('profile.edit');
    Route::put('/profile',      [UserController::class,'update'])       ->name('profile.update');

    // Bestellingen plaatsen
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (alleen voor admins)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         // Dashboard
         Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

         // Gebruikersbeheer
         Route::resource('users', UserManagementController::class)
              ->names('users')
              ->except('show');
         Route::post('users/{user}/promote', [UserManagementController::class,'promote'])
              ->name('users.promote');
         Route::post('users/{user}/demote',  [UserManagementController::class,'demote'])
              ->name('users.demote');

         // Nieuwsbeheer
         Route::resource('news', AdminNewsController::class)->names('news');

         // FAQ-categorieën beheer
         Route::resource('faq-categories', AdminFaqCategoryController::class)
              ->names('faq-categories');

         // FAQ-vragen beheer
         Route::resource('faq', AdminFaqController::class)->names('faq');

         // Contact-inbox & verwijderen
         Route::get('contact/inbox',        [AdminContactController::class, 'inbox'])
              ->name('contact.inbox');
         Route::delete('contact/{message}', [AdminContactController::class, 'destroy'])
              ->name('contact.destroy');

         // Bestellingen beheer
         Route::get('orders',            [AdminOrderController::class, 'index'])
              ->name('orders.index');
         Route::delete('orders/{order}', [AdminOrderController::class, 'destroy'])
              ->name('orders.destroy');
     });
