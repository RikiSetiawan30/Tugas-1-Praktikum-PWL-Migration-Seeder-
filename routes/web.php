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
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('categories/export-excel', [CategoryController::class, 'exportExcel'])->name('categories.export-excel');
Route::get('categories/export-pdf', [CategoryController::class, 'exportPdf'])->name('categories.export-pdf');

Route::get('bookshelfs/export-excel', [BookshelfController::class, 'exportExcel'])->name('bookshelfs.export-excel');
Route::get('bookshelfs/export-pdf', [BookshelfController::class, 'exportPdf'])->name('bookshelfs.export-pdf');

Route::get('books/export-excel', [BookController::class, 'exportExcel'])->name('books.export-excel');
Route::get('books/export-pdf', [BookController::class, 'exportPdf'])->name('books.export-pdf');

Route::get('users/export-excel', [UserController::class, 'exportExcel'])->name('users.export-excel');
Route::get('users/export-pdf', [UserController::class, 'exportPdf'])->name('users.export-pdf');

Route::get('loans/export-excel', [LoanController::class, 'exportExcel'])->name('loans.export-excel');
Route::get('loans/export-pdf', [LoanController::class, 'exportPdf'])->name('loans.export-pdf');

Route::get('returns/export-excel', [ReturnController::class, 'exportExcel'])->name('returns.export-excel');
Route::get('returns/export-pdf', [ReturnController::class, 'exportPdf'])->name('returns.export-pdf');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('categories.index');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('bookshelfs', BookshelfController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('returns', ReturnController::class);
});