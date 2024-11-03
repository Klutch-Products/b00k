@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Us</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Get in Touch</h2>
                    <p class="text-gray-700 mb-4">
                        Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as
                        possible.
                    </p>

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>
                        <dl class="mt-2 text-base text-gray-700">
                            <div class="mt-3">
                                <dt class="font-medium">Email</dt>
                                <dd>contact@bookstore.com</dd>
                            </div>
                            <div class="mt-3">
                                <dt class="font-medium">Phone</dt>
                                <dd>+1 (555) 123-4567</dd>
                            </div>
                            <div class="mt-3">
                                <dt class="font-medium">Address</dt>
                                <dd>123 Book Street, Reading City, RC 12345</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" id="message" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div>
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
