<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


/**
 * BookController handles all book-related operations
 * Including CRUD operations and image handling
 */
class BookController extends BaseController
{


    /**
     * Display a paginated list of books
     */
    public function index(): View
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show form for creating a new book
     */
    public function create(): View
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created book
     * Handles image upload and storage
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'description' => 'nullable',
            'isbn' => 'nullable|max:13',
            'publication_date' => 'nullable|date',
            'category' => 'nullable',
            'pages' => 'nullable|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle cover image upload if present
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = Str::slug($validated['title']) . '-' . time() . '.' . $file->getClientOriginalExtension();

            // Store image in a year/month structure
            $path = $file->storeAs(
                'books/covers/' . date('Y/m'),
                $filename,
                'public'
            );

            $validated['cover_image'] = $path;
        }

        // Create new book record
        $book = Book::create($validated);

        return redirect()->route('books.show', $book)
            ->with('success', 'Book created successfully');
    }

    /**
     * Display specific book details
     */
    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show form for editing a book
     */
    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update specified book
     * Handles image replacement and old image cleanup
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        // Validate incoming request data
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

        // Handle cover image update if new image is uploaded
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

    /**
     * Delete specified book
     * Includes cleanup of associated image
     */
    public function destroy(Book $book): RedirectResponse
    {
        // Delete associated cover image if it exists
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        // Delete book record
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
