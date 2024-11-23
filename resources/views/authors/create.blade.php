@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Create New Author</h2>

                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="biography" class="block text-sm font-medium text-gray-700">Biography</label>
                        <textarea name="biography" id="biography" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                        <input type="date" name="birth_date" id="birth_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                        <input type="text" name="nationality" id="nationality" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Author
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection