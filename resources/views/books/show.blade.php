@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <nav class="mb-8">
        <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700">
            <span class="inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Books
            </span>
        </a>
    </nav>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $book->title }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Book Cover Image -->
                <div class="aspect-w-3 aspect-h-4">
                    @if($book->cover_image)
                        <img src="{{ asset($book->cover_image) }}"
                             alt="Cover of {{ $book->title }}"
                             class="object-cover rounded-lg shadow-md w-full h-full">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
                            <span class="text-gray-400">No cover image available</span>
                        </div>
                    @endif
                </div>

                <!-- Book Details -->
                <div class="space-y-4">
                    <div>
                        <h2 class="text-sm font-semibold text-gray-500">Author</h2>
                        <p class="text-lg text-gray-900">{{ $book->author->name }}</p>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-500">Publication Date</h2>
                        <p class="text-lg text-gray-900">{{ $book->publication_date?->format('F j, Y') }}</p>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-500">ISBN</h2>
                        <p class="text-lg text-gray-900">{{ $book->isbn ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-500">Description</h2>
                        <p class="text-gray-700 mt-2 leading-relaxed">
                            {{ $book->description }}
                        </p>
                    </div>

                    <!-- Additional Details -->
                    <div class="border-t pt-4 mt-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-sm text-gray-500">Category:</span>
                                <span class="ml-2 text-gray-900">{{ $book->category ?? 'Uncategorized' }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">Pages:</span>
                                <span class="ml-2 text-gray-900">{{ $book->pages ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-6">
                        <a href="{{ route('books.edit', $book) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                            Edit Book
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors"
                                    onclick="return confirm('Are you sure you want to delete this book?')">
                                Delete Book
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection