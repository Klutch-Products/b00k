<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('app');
//});


// Email Route - Subscribe
Route::post('/subscribe/{publisher}', [SubscriptionController::class,
    'subscribe']);
// Download PDF
Route::post('/download-pdf/{book}', [SubscriptionController::class,
    'downloadPdf']);


//===============================================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//==========================
// privacy policies

Route::prefix('policies')->group(function () {
    Route::get('/privacy', function () {
        return view('policies.privacy');
    })->name('policies.privacy');

    Route::get('/cookies', function () {
        return view('policies.cookies');
    })->name('policies.cookies');

    Route::get('/terms', function () {
        return view('policies.terms');
    })->name('policies.terms');


});

