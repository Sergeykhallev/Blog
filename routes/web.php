<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Main\IndexController;
use \App\Http\Controllers\Admin\Main\MainController;

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
});

Auth::routes();


