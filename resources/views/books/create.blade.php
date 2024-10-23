<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <header class="mb-8">
        <h1 class="text-center text-3xl font-bold text-gray-800">Create a New Book</h1>
        <p class="text-center text-gray-600 mt-2">Use the form to create a new book</p>
    </header>

    <hr class="my-6 border-t border-gray-300">

    <main>
        <section class="main-content">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="createBookForm" method="POST" action="{{ route('book.create') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="book-title" class="block text-sm font-medium text-gray-700">Book Title</label>
                        <input type="text" id="book-title" name="book-title" required maxlength="255" placeholder="Enter book title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="book-author" class="block text-sm font-medium text-gray-700">Book Author</label>
                        <input type="text" id="book-author" name="book-author" required maxlength="255" placeholder="Enter book author" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="book-description" class="block text-sm font-medium text-gray-700">Book Description</label>
                        <textarea id="book-description" name="book-description" rows="4" placeholder="Enter book description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>

                    <div>
                        <label for="book-date" class="block text-sm font-medium text-gray-700">Publication Date</label>
                        <input type="date" id="book-date" name="book-date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Create Book
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="mt-8 text-center text-gray-500 text-sm">
        <p>&copy; {{ date('Y') }} Your Bookstore. All rights reserved.</p>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('createBookForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Basic form validation
            const title = document.getElementById('book-title').value.trim();
            const author = document.getElementById('book-author').value.trim();
            const description = document.getElementById('book-description').value.trim();
            const date = document.getElementById('book-date').value;

            if (!title || !author || !description || !date) {
                alert('Please fill in all fields');
                return;
            }

            // If validation passes, submit the form
            form.submit();
        });
    });
</script>
</body>
</html>
