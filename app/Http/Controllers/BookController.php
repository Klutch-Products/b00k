<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends BaseController
{
    public function index(): View
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'isbn' => 'nullable|max:13',
            'publication_date' => 'nullable|date',
            'category' => 'nullable',
            'pages' => 'nullable|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $this->storeImage($request->file('cover_image'), $validated['title']);
        }

        $book = Book::create($validated);

        return redirect()->route('books.show', $book)
            ->with('success', 'Book created successfully');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
            'isbn' => 'nullable|max:13',
            'publication_date' => 'nullable|date',
            'category' => 'nullable',
            'pages' => 'nullable|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $this->storeImage(
                $request->file('cover_image'),
                $validated['title'],
                $book->cover_image
            );
        }

        $book->update($validated);

        return redirect()->route('books.show', $book)
            ->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
