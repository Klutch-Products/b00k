<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <!-- Admin Sidebar -->
                        <div class="w-64 bg-gray-100 p-4">
                            <nav>
                                <a href="{{ route('admin.dashboard') }}" class="block py-2 hover:text-indigo-600">Dashboard</a>
                                <a href="{{ route('admin.users') }}" class="block py-2 hover:text-indigo-600">Users</a>
                                <a href="{{ route('admin.books') }}" class="block py-2 hover:text-indigo-600">Books</a>
                                <a href="{{ route('admin.publishers') }}" class="block py-2 hover:text-indigo-600">Publishers</a>
                            </nav>
                        </div>
                        
                        <!-- Main Content -->
                        <div class="flex-1 p-4">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>