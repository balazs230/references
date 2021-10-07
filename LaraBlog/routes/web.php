<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\LogHistory;
use Illuminate\Support\Facades\Redis;
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

Route::get('/', [FeedController::class, 'index']);

Route::get('/search', [FeedController::class, 'search'])->name('search');

Route::get('/show_category_posts/{id}/articles', [FeedController::class, 'showCategoryPosts'])->name('feed.showCategoryPosts');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/categories/{id}/articles', [CategoryController::class, 'showArticlesByCategory'])->name('categories.showArticlesByCategory');

Route::get('/articles/{id}/comments', [CommentController::class, 'article_comments'])->name('comments.article_comments');

Route::resources([
    'articles' => ArticleController::class,
    'categories' => CategoryController::class,
    'comments' => CommentController::class,
    'subscribers' => SubscriberController::class,
    'history' => HistoryController::class, 
    ]);