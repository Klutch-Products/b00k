@extends('layouts.app')

@section('title', 'Welcome to B00k5t0re')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <!-- Hero Section -->
    <div class="relative bg-primary">
        <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    <span class="block">Discover Your Next</span>
                    <span class="block text-accent">Favorite Book</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-primary-light sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Explore our vast collection of digital books. From bestsellers to rare finds, we have something for every reader.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="{{ route('books.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Browse Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl text-center mb-12">
            Featured Books
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredBooks as $book)
            <div class="group relative">
                <div class="w-full bg-gray-200 rounded-lg overflow-hidden aspect-w-3 aspect-h-4">
                    <img src="{{ $book->cover_image ?? asset('images/default-book-cover.jpg') }}" 
                         alt="{{ $book->title }}" 
                         class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            <a href="{{ route('books.show', $book) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $book->title }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $book->author }}</p>
                    </div>
                    <p class="text-lg font-medium text-accent">${{ number_format($book->price, 2) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('books.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-primary-light">
                View All Books
            </a>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl text-center mb-12">
                Popular Categories
            </h2>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                @foreach(['Fiction', 'Non-Fiction', 'Science', 'Technology', 'History', 'Biography', 'Business', 'Self-Help'] as $category)
                <a href="#" class="relative rounded-lg p-6 bg-white dark:bg-gray-700 hover:bg-primary hover:text-white transition-colors duration-200 text-center">
                    <h3 class="text-lg font-medium">{{ $category }}</h3>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Stay Updated
                </h2>
                <p class="mt-4 text-lg leading-6 text-primary-light">
                    Subscribe to our newsletter for the latest book releases and special offers.
                </p>
                <div class="mt-8 sm:flex sm:justify-center">
                    <div class="sm:flex-1 max-w-md">
                        <form class="sm:flex">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" 
                                   type="email" 
                                   placeholder="Enter your email" 
                                   class="w-full px-5 py-3 border border-transparent rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary focus:ring-white">
                            <button type="submit" 
                                    class="mt-3 sm:mt-0 sm:ml-3 w-full sm:w-auto flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-primary-light hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary focus:ring-white">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection