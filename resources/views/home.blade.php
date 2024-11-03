@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Welcome to Our Book Store
                </h1>
                <p class="mt-5 max-w-xl mx-auto text-xl text-gray-500">
                    Discover amazing books and expand your knowledge with our carefully curated collection.
                </p>
                <div class="mt-8">
                    <a href="{{ route('books.index') }}"
                       class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Browse Books
                    </a>
                </div>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                    <!-- Add featured books here -->
                    <div class="mt-16">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Featured Books</h2>
                        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                            @forelse ($featuredBooks as $book)
                                <div class="group relative">
                                    <div class="aspect-w-3 aspect-h-4 rounded-lg overflow-hidden bg-gray-100">
                                        @if($book->cover_image)
                                            <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}"
                                                 class="object-cover object-center w-full h-full">
                                        @else
                                            <div class="flex items-center justify-center h-full">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('books.show', $book) }}">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                                    {{ $book->title }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{ $book->author }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center text-gray-500">
                                    No featured books available yet.
                                </div>
                            @endforelse
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
