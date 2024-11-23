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
        <x-alerts.success :message="session('success')" />
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @if($books->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @foreach($books as $book)
                    <x-cards.book :book="$book" />
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