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
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Featured Books</h2>
                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                    <!-- Add featured books here -->
                </div>
            </div>
        </div>
    </div>
@endsection
