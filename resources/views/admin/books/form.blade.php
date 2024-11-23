@extends('layouts.admin')

@section('title', isset($book) ? 'Edit Book' : 'Create Book')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <form action="{{ isset($book) ? route('admin.books.update', $book) : route('admin.books.store') }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf
            @if(isset($book))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" 
                           value="{{ old('title', $book->title ?? '') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
                    <select name="author_id" id="author_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ (isset($book) && $book->author_id == $author->id) ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $book->description ?? '') }}</textarea>
                </div>

                <div>
                    <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                    @if(isset($book) && $book->cover_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current cover" class="h-32 w-24 object-cover">
                        </div>
                    @endif
                    <input type="file" name="cover_image" id="cover_image" class="mt-1 block w-full">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                        <input type="text" name="isbn" id="isbn" 
                               value="{{ old('isbn', $book->isbn ?? '') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="publication_date" class="block text-sm font-medium text-gray-700">Publication Date</label>
                        <input type="date" name="publication_date" id="publication_date" 
                               value="{{ old('publication_date', isset($book) ? $book->publication_date->format('Y-m-d') : '') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.books.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ isset($book) ? 'Update Book' : 'Create Book' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection