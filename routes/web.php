<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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
Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::get('/posts/{slug}', [PostController::class, 'show']);
//
Route::post('comments', [CommentController::class, 'store']);

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {

    // Dashboard
    Route::group(['prefix' => '', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    // Posts
    Route::group(['prefix' => 'posts', 'as' => 'control_posts.'], function () {
        Route::get('/', [PostController::class, 'index_dashboard'])->name('index');
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('{post:slug}', [PostController::class, 'update'])->name('update');
        Route::delete('{post:slug}/delete', [PostController::class, 'destroy'])->name('delete');
    });
});
