<nav class="bg-primary dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <!-- Primary Navigation Menu -->
            <div class="flex">
                <div class="hidden sm:flex sm:space-x-8 items-center">
                    <!-- Primary Navigation Links -->
                    <a href="{{ route('home') }}"
                       class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'border-b-2 border-accent' : '' }}">
                        Home
                    </a>

                    <div class="relative group">
                        <button class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium inline-flex items-center">
                            Categories
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute z-10 left-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Fiction
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Non-Fiction
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Science
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Technology
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('books.index') }}"
                       class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium {{ request()->routeIs('books.index') ? 'border-b-2 border-accent' : '' }}">
                        All Books
                    </a>

                    <a href="#"
                       class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium {{ request()->routeIs('new-releases') ? 'border-b-2 border-accent' : '' }}">
                        New Releases
                    </a>

                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}"
                               class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'border-b-2 border-accent' : '' }}">
                                Admin Panel
                            </a>
                        @endif

                        @if(auth()->user()->hasRole('publisher'))
                            <a href="{{ route('publisher.dashboard') }}"
                               class="text-white hover:text-primary-light dark:hover:text-gray-300 px-3 py-2 text-sm font-medium {{ request()->routeIs('publisher.dashboard') ? 'border-b-2 border-accent' : '' }}">
                                Publisher Dashboard
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Mobile Navigation Button -->
            <div class="flex items-center sm:hidden">
                <button type="button"
                        class="mobile-nav-button inline-flex items-center justify-center p-2 rounded-md text-white hover:text-primary-light focus:outline-none"
                        aria-controls="mobile-menu"
                        aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}"
               class="text-white hover:text-primary-light block px-3 py-2 text-base font-medium {{ request()->routeIs('home') ? 'bg-primary-light' : '' }}">
                Home
            </a>

            <!-- Mobile Categories Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="text-white hover:text-primary-light px-3 py-2 text-base font-medium w-full text-left flex justify-between items-center">
                    Categories
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="px-4 py-2 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-white hover:text-primary-light">Fiction</a>
                    <a href="#" class="block px-3 py-2 text-sm text-white hover:text-primary-light">Non-Fiction</a>
                    <a href="#" class="block px-3 py-2 text-sm text-white hover:text-primary-light">Science</a>
                    <a href="#" class="block px-3 py-2 text-sm text-white hover:text-primary-light">Technology</a>
                </div>
            </div>

            <a href="{{ route('books.index') }}"
               class="text-white hover:text-primary-light block px-3 py-2 text-base font-medium {{ request()->routeIs('books.index') ? 'bg-primary-light' : '' }}">
                All Books
            </a>

            <a href="#"
               class="text-white hover:text-primary-light block px-3 py-2 text-base font-medium {{ request()->routeIs('new-releases') ? 'bg-primary-light' : '' }}">
                New Releases
            </a>

            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-white hover:text-primary-light block px-3 py-2 text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-primary-light' : '' }}">
                        Admin Panel
                    </a>
                @endif

                @if(auth()->user()->hasRole('publisher'))
                    <a href="{{ route('publisher.dashboard') }}"
                       class="text-white hover:text-primary-light block px-3 py-2 text-base font-medium {{ request()->routeIs('publisher.dashboard') ? 'bg-primary-light' : '' }}">
                        Publisher Dashboard
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<script>
    // Toggle mobile menu
    document.querySelector('.mobile-nav-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
