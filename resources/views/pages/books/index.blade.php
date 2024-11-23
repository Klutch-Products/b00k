<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <header class="mb-8">
        <h1 class="text-center text-3xl font-bold text-gray-800">Books</h1>
        <p class="text-center text-gray-600 mt-2">Check out our latest selection of books.</p>
    </header>

    <hr class="my-6 border-t border-gray-300">

    <main>
        <section class="main-content">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Our Collection</h2>
                @if($books->isNotEmpty())
                    <ul class="space-y-2">
                        @foreach($books as $book)
                            <li class="p-2 bg-gray-50 rounded">
                                {{ $book }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No books available at the moment.</p>
                @endif
            </div>
        </section>
    </main>

    <footer class="mt-8 text-center text-gray-500 text-sm">
        <p>&copy; {{ date('Y') }} Your Bookstore. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
