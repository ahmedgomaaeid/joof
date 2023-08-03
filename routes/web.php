<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('news', [\App\Http\Controllers\HomeController::class, 'news'])->name('news');

// admins routes
Route::prefix('admin')->group(function () {
    // login routes
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('post.admin.login');
    });

    // admin routes
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
        Route::get('/add-admin', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
        Route::post('/add-admin', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('post.admin.create');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.delete');
        
        // articles routes
        Route::get('/articles', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.articles');
        Route::get('/add-article', [\App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('admin.create.articles');
        Route::post('/add-article', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('post.admin.create.articles');
        Route::get('/edit-article/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.edit.articles');
        Route::post('/edit-article/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('post.admin.edit.articles');
        Route::get('/delete-article/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('admin.delete.articles');

        // categories routes
        Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
        Route::get('/add-category', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.create.category');
        Route::post('/add-category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('post.admin.create.category');
        Route::get('/edit-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.edit.category');
        Route::post('/edit-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('post.admin.edit.category');
        Route::get('/delete-category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.delete.category');

        //logout route
        Route::get('logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
    });
});
