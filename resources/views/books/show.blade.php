<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title ?? 'Book Details' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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

    @if(isset($book))
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $book->title }}</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Book Cover Image (if available) -->
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
                            <p class="text-lg text-gray-900">{{ $book->author }}</p>
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
                            <a href="{{ route('books.edit', $book->id) }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                                Edit Book
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
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
    @else
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-500 text-center">Book not found.</p>
        </div>
    @endif

    <footer class="mt-8 text-center text-gray-500 text-sm">
        <p>&copy; {{ date('Y') }} Your Bookstore. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
