<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('bookshelfs', BookshelfController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('returns', ReturnController::class);
});