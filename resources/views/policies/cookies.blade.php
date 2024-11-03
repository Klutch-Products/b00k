@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Cookie Policy</h1>
            <div class="prose max-w-none text-gray-700">
                <p class="mb-4">Last updated: {{ date('F d, Y') }}</p>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. What Are Cookies</h2>
                    <p class="mb-4">
                        Cookies are small text files that are placed on your computer or mobile device when you visit
                        our website. They are widely used to make websites work more efficiently and provide information
                        to the website owners.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. How We Use Cookies</h2>
                    <p class="mb-4">We use cookies for the following purposes:</p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Essential cookies: Required for the website to function properly</li>
                        <li>Analytical cookies: To analyze how visitors use our website</li>
                        <li>Functional cookies: To remember your preferences</li>
                        <li>Targeting cookies: To deliver more relevant advertisements</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Types of Cookies We Use</h2>
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-2">Essential Cookies</h3>
                        <p>These cookies are necessary for the website to function and cannot be switched off in our
                            systems.</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-2">Performance Cookies</h3>
                        <p>These cookies allow us to count visits and traffic sources so we can measure and improve the
                            performance of our site.</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-2">Functional Cookies</h3>
                        <p>These cookies enable the website to provide enhanced functionality and personalization.</p>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Managing Cookies</h2>
                    <p class="mb-4">
                        Most web browsers allow you to control cookies through their settings preferences. However, if
                        you limit the ability of websites to set cookies, you may worsen your overall user experience.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Contact Us</h2>
                    <p class="mb-4">
                        If you have any questions about our Cookie Policy, please contact us at:
                        <br>
                        Email: privacy@{{ str_replace(['http://', 'https://', 'www.'], '', config('app.url')) }}
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection
