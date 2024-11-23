<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Current Profile Picture -->
                        <div class="mt-4">
                            <img src="{{ auth()->user()->profile_picture_url }}"
                                 alt="{{ auth()->user()->name }}'s profile picture"
                                 class="w-20 h-20 rounded-full object-cover">
                        </div>

                        <!-- Profile Picture Upload -->
                        <div class="mt-4">
                            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                            <input type="file"
                                   id="profile_picture"
                                   name="profile_picture"
                                   class="mt-1 block w-full"
                                   accept="image/*" />
                            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
                        </div>

                        @include('profile.partials.update-profile-information-form')
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
