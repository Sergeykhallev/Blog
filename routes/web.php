<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use \App\Http\Controllers\Admin\Category\DestroyController;
use App\Http\Controllers\Admin\Main\MainController;
use App\Http\Controllers\Main\IndexController;
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

Route::namespace('main')->group(function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/', [MainController::class, '__invoke']);
    });
    Route::namespace('Category')->prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [DestroyController::class, '__invoke'])->name('admin.category.delete');
    });
    Route::namespace('Tag')->prefix('tags')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Tag\TagController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Tag\CreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [\App\Http\Controllers\Admin\Tag\StoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [\App\Http\Controllers\Admin\Tag\ShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [\App\Http\Controllers\Admin\Tag\EditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [\App\Http\Controllers\Admin\Tag\UpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [\App\Http\Controllers\Admin\Tag\DestroyController::class, '__invoke'])->name('admin.tag.delete');
    });
});

Auth::routes();


