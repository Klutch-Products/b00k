<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index(): View
    {
        // Get featured books - either by a featured flag or latest books
        $featuredBooks = Book::query()
            ->when(Book::hasColumn('is_featured'), function ($query) {
                $query->where('is_featured', true);
            })
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredBooks'));
    }
}
