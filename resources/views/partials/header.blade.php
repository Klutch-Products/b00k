<header class="bg-white dark:bg-gray-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo/Brand Section --}}
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-primary dark:text-white">B00k5t0re</span>
                </a>
            </div>

            {{-- Search Bar --}}
            <div class="hidden sm:block flex-1 max-w-xl px-6">
                <form action="{{ route('books.index') }}" method="GET" class="w-full">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search for books..."
                            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary focus:ring-primary">
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Navigation Links --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <a href="{{ route('books.index') }}"
                    class="text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Books
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-primary text-white hover:bg-primary-light px-4 py-2 rounded-md text-sm font-medium">
                        Register
                    </a>
                @endauth
            </div>

            {{-- Mobile menu button --}}
            <div class="flex items-center sm:hidden">
                <button type="button"
                    class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu, show/hide based on menu state --}}
    <div class="sm:hidden hidden mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('books.index') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                Books
            </a>
            @auth
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                    Dashboard
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-primary hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                    Register
                </a>
            @endauth
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>
