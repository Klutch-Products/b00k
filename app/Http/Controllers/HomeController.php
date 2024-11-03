<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $featuredBooks = Book::latest()->take(6)->get();
        return view('home', compact('featuredBooks'));
    }
}
