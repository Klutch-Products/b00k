<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $booksCount = Book::count();
        $authorsCount = Author::count();
        
        return view('admin.dashboard', compact('booksCount', 'authorsCount'));
    }
}