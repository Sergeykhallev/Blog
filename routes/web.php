<?php

use App\Http\Controllers\Admin\Main\MainController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Category\CategoryController;
use \App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\StoreController;
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

Route::namespace('main')->group(function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/', [MainController::class, '__invoke']);
    });
    Route::namespace('Category')->prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [StoreController::class, '__invoke'])->name('admin.category.store');
    });
});

Auth::routes();


