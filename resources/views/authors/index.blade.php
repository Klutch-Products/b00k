@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Authors</h2>
                    <a href="{{ route('authors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Author
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Nationality</th>
                                <th class="px-4 py-2">Books Count</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                            <tr>
                                <td class="border px-4 py-2">{{ $author->name }}</td>
                                <td class="border px-4 py-2">{{ $author->nationality }}</td>
                                <td class="border px-4 py-2">{{ $author->books_count }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('authors.edit', $author) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection