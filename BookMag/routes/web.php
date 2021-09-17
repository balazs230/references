<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Models\Book;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/email', [TestController::class, 'index']);

Route::get('cart', [OrderController::class, 'cart'])->name('cart');

Route::get('add-to-cart/{id}', [OrderController::class, 'addToCart'])->middleware('auth')->name('addToCart');

Route::delete('remove-from-cart', [OrderController::class, 'remove']);

Route::get('/search', [SiteController::class, 'search'])->name('search');

Route::get('/show_category_books/{id}/books', [SiteController::class, 'showCategoryBooks'])->name('site.showCategoryBooks');

Route::get('users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');

Route::put('users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');

Route::resource('sites', SiteController::class)->except('index');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth', 'admin.check')->name('dashboard');

Route::get('users', [RegisteredUserController::class, 'index'])->middleware('auth', 'admin.check')->name('users');

Route::delete('users/{user}', [RegisteredUserController::class, 'destroy'])->middleware('auth')->name('users.destroy');

Route::get('book/{book_id}/description', [DescriptionController::class, 'addDescription'])->name('book.description');

Route::resource('categories', CategoryController::class);

Route::resource('books', BookController::class);

Route::resource('descriptions', DescriptionController::class)->only('index', 'store', 'destroy');

Route::get('book/{id}/reviews', [ReviewController::class, 'book_reviews'])->name('book.reviews');

Route::resource('reviews', ReviewController::class)->only('index', 'store', 'destroy');

Route::get('user/{id}/orders', [OrderController::class, 'user_orders'])->name('user.orders');

Route::resource('orders', OrderController::class);

require __DIR__.'/auth.php';
