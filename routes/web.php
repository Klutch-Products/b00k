<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// new home
Route::get('/', [HomeController::class, 'index'])->name('home');





// Guest accessible routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Authors
Route::resource('authors', AuthorController::class);


Route::middleware(['auth', 'verified'])->group(function () {
    // User routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin routes
    // Route::middleware(['role:admin'])
    //     ->prefix('admin')
    //     ->group(function () {
    //         Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //         Route::resource('users', AdminUserController::class);
    //         Route::resource('books', AdminBookController::class);
    //     });

    // Publisher routes
    // Route::middleware(['role:publisher'])
    //     ->prefix('publisher')
    //     ->group(function () {
    //         Route::get('/dashboard', [PublisherController::class, 'dashboard'])->name('publisher.dashboard');
    //         Route::resource('books', PublisherBookController::class);
    //     });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
