<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('books.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title"
                                class="block w-full mt-1"
                                type="text"
                                name="title"
                                :value="old('title')"
                                required
                                autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="author" :value="__('Author')" />
                            <x-text-input id="author"
                                class="block w-full mt-1"
                                type="text"
                                name="author"
                                :value="old('author')"
                                required />
                            <x-input-error :messages="$errors->get('author')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea-input id="description"
                                class="block w-full mt-1"
                                name="description"
                                :value="old('description')"
                                required />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="publication_date" :value="__('Publication Date')" />
                            <x-text-input id="publication_date"
                                class="block w-full mt-1"
                                type="date"
                                name="publication_date"
                                :value="old('publication_date')"
                                required />
                            <x-input-error :messages="$errors->get('publication_date')" class="mt-2" />
                        </div>

                    <div class="flex items-center justify-end mt-4">
                            <x-secondary-button class="mr-3" onclick="window.history.back()">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-primary-button>
                                {{ __('Create Book') }}
                            </x-primary-button>
                        </div>
                    </form>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
