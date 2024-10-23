<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

/**
 *
 */
class BookController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'published_at' => 'nullable|date',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'published_at' => 'nullable|date',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
