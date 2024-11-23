@props(['book'])

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