<?php

Route::get('/', function () {
    return view('app');
});







//
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BookController;
//use App\Http\Controllers\HomeController;
//
//Route::get('/', [HomeController::class, 'index'])->name('home');
//
//Route::prefix('books')->group(function () {
//    Route::get('/', [BookController::class, 'index'])->name('books.index');
//    Route::get('/create', [BookController::class, 'create'])->name('books.create');
//    Route::post('/', [BookController::class, 'store'])->name('books.store');
//    Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
//    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
//    Route::put('/{book}', [BookController::class, 'update'])->name('books.update');
//    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
//});
//
//Route::get('/about', function () {
//    return view('about');
//})->name('about');
//
//Route::get('/contact', function () {
//    return view('contact');
//})->name('contact');
//
