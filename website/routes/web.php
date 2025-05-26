<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\ContactController   as AdminContactController;
use App\Http\Controllers\Admin\OrderController     as AdminOrderController;
use App\Models\FaqCategory;
use App\Models\User;
use App\Models\NewsItem;

/*
|--------------------------------------------------------------------------
| Public homepage
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $faqCategories = FaqCategory::with('faqs')->get();
    $users         = User::latest()->take(12)->get();
    $newsItems     = NewsItem::latest()->paginate(3);

    return view('welcome', compact('faqCategories','users','newsItems'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Public FAQ & Contact
|--------------------------------------------------------------------------
*/
Route::get('/faq',         [FaqController::class,'publicIndex'])->name('faq.public');
Route::post('/faq/submit', [FaqController::class,'submit'])     ->name('faq.submit');

Route::get('/contact',     [ContactController::class,'show'])   ->name('contact.form');
Route::post('/contact',    [ContactController::class,'submit']) ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Public News
|--------------------------------------------------------------------------
*/
Route::get('/nieuws',            [NewsController::class,'index'])->name('news.index');
Route::get('/nieuws/{newsItem}', [NewsController::class,'show']) ->name('news.show');

// Public list of profiles
Route::get('/profielen', [App\Http\Controllers\UserController::class, 'publicIndex'])
     ->name('profiles.index');

// Public single profile
Route::get('/profielen/{user}', [App\Http\Controllers\UserController::class, 'publicShow'])
     ->name('profiles.show');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login',    [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',   [LoginController::class,'login']);
Route::post('/logout',  [LoginController::class,'logout'])      ->name('logout');

Route::get('/register', [RegisteredUserController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisteredUserController::class,'register']);

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard',        [UserController::class,'userDashboard'])
         ->name('user.dashboard');

    // Profile show/edit/update, with {username}
    Route::get('/profile/{username}',       [UserController::class,'profile'])
         ->name('profile.show');
    Route::get('/profile/{username}/edit',  [UserController::class,'edit'])
         ->name('profile.edit');
    Route::put('/profile/{username}',       [UserController::class,'update'])
         ->name('profile.update');

    // Place orders
    Route::post('/orders', [OrderController::class,'store'])
         ->name('orders.store');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (only for admins)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         // Dashboard
         Route::get('dashboard', [AdminDashboardController::class,'index'])
              ->name('dashboard');

         // User management
         Route::post('users/{user}/promote',[UserManagementController::class,'promote'])
              ->name('users.promote');
         Route::post('users/{user}/demote', [UserManagementController::class,'demote'])
              ->name('users.demote');
         Route::resource('users', UserManagementController::class)
              ->except('show');

         // News
         Route::resource('news', AdminNewsController::class)
              ->names('news');

         // FAQ categories & questions
         Route::resource('faq-categories', AdminFaqCategoryController::class)
              ->names('faq-categories');
         Route::resource('faq',             AdminFaqController::class)
              ->names('faq');

         // Contact inbox
         Route::get('contact/inbox',    [AdminContactController::class,'inbox'])
              ->name('contact.inbox');
         Route::delete('contact/{message}', [AdminContactController::class,'destroy'])
              ->name('contact.destroy');

         // Orders
         Route::get('orders',          [AdminOrderController::class,'index'])
              ->name('orders.index');
         Route::delete('orders/{order}', [AdminOrderController::class,'destroy'])
              ->name('orders.destroy');
     });
