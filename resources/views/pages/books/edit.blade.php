@extends('layouts.app')

@section('title', 'Edit Book - ' . $book->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <header class="mb-8">
        <h1 class="text-center text-3xl font-bold text-gray-800">Edit Book</h1>
            <p class="text-center text-gray-600 mt-2">Edit "{{ $book->title }}"</p>
    </header>

    <hr class="my-6 border-t border-gray-300">

        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="editBookForm" method="POST" action="{{ route('books.update', $book) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Book Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $book->title) }}"
                            required
                            maxlength="255"
                            placeholder="Enter book title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('title') border-red-500 @enderror"
                        >
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Book Author</label>
                        <input
                            type="text"
                            id="author"
                            name="author"
                            value="{{ old('author', $book->author) }}"
                            required
                            maxlength="255"
                            placeholder="Enter book author"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('author') border-red-500 @enderror"
                        >
                        @error('author')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
            </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Book Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            placeholder="Enter book description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('description') border-red-500 @enderror"
                        >{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
</div>

                    <div>
                        <label for="publication_date" class="block text-sm font-medium text-gray-700">Publication Date</label>
                        <input
                            type="date"
                            id="publication_date"
                            name="publication_date"
                            value="{{ old('publication_date', $book->publication_date?->format('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('publication_date') border-red-500 @enderror"
                        >
                        @error('publication_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3 mt-6">
                        <a
                            href="{{ route('books.index') }}"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        >
                            Cancel
                        </a>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editBookForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Basic form validation
            const title = document.getElementById('title').value.trim();
            const author = document.getElementById('author').value.trim();
            const description = document.getElementById('description').value.trim();
            const date = document.getElementById('publication_date').value;

            if (!title || !author || !description || !date) {
                alert('Please fill in all required fields');
                return;
            }

            // If validation passes, submit the form
            form.submit();
        });
    });
</script>
@endpush
