<?php

use App\Http\Controllers\Admin\AdministrationController as AdminAdministrationController;
use App\Http\Controllers\CategoryController as MainCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController as MainPostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController as MainTagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\MainController as UserMainController;

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

Route::get('/', [MainPostController::class, 'index'])->name('home');
Route::get('/article/{slug}', [MainPostController::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [MainCategoryController::class, 'show'])->name('categories.single');
Route::get('/tag/{slug}', [MainTagController::class, 'show'])->name('tags.single');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/author/{id}', [MainPostController::class, 'postsAuthor'])->name('author.post');

Route::post('/comments', [CommentController::class, 'storeOrReply'])->name('comments.storeOrReply');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::get('/', [AdminMainController::class, 'index'])->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/tags', AdminTagController::class);
        Route::resource('/posts', AdminPostController::class);
        Route::resource('/administrations', AdminAdministrationController::class);
    });

Route::prefix('user')
    ->name('user.')
    ->middleware('userPanel')
    ->group(function () {
        Route::get('/', [UserMainController::class, 'index'])->name('index');
        Route::resource('/posts', UserPostController::class);
    });

Route::middleware('guest')
    ->group(function (){
        Route::get('/register', [UserController::class, 'create'])->name('register.create');
        Route::post('/register', [UserController::class, 'store'])->name('register.store');
        Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
        Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

