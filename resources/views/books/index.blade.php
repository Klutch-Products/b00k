@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Books Collection</h1>
        <a href="{{ route('books.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
            Add New Book
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @if($books->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @foreach($books as $book)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                        <div class="aspect-w-3 aspect-h-4">
                            @if($book->cover_image)
                                <img src="{{ asset($book->cover_image) }}" 
                                     alt="Cover of {{ $book->title }}"
                                     class="object-cover w-full h-48">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No cover image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $book->title }}</h2>
                            <p class="text-gray-600 mb-2">By {{ $book->author->name }}</p>
                            <p class="text-sm text-gray-500 mb-4">
                                Published: {{ $book->publication_date?->format('M d, Y') }}
                            </p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('books.show', $book) }}" 
                                   class="text-blue-500 hover:text-blue-700">
                                    View Details
                                </a>
                                @if($book->price)
                                    <span class="text-green-600 font-semibold">
                                        ${{ number_format($book->price, 2) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="px-6 py-4">
                {{ $books->links() }}
            </div>
        @else
            <div class="p-6 text-center text-gray-500">
                No books available at the moment.
            </div>
        @endif
    </div>
</div>
@endsection