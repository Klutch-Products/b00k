@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Privacy Policy</h1>
            <div class="prose max-w-none text-gray-700">
                <p class="mb-4">Last updated: {{ date('F d, Y') }}</p>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. Introduction</h2>
                    <p class="mb-4">
                        Welcome to {{ config('app.name') }}. We respect your privacy and are committed to protecting
                        your personal data. This privacy policy will inform you about how we look after your personal
                        data when you visit our website and tell you about your privacy rights and how the law protects
                        you.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Data We Collect</h2>
                    <p class="mb-4">We may collect, use, store and transfer different kinds of personal data about you,
                        including:</p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Identity Data (first name, last name, username)</li>
                        <li>Contact Data (email address, telephone numbers)</li>
                        <li>Technical Data (IP address, browser type, device information)</li>
                        <li>Usage Data (how you use our website)</li>
                        <li>Marketing and Communications Data</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. How We Use Your Data</h2>
                    <p class="mb-4">We use your data to:</p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Provide and manage your account</li>
                        <li>Process your orders</li>
                        <li>Send you important updates</li>
                        <li>Improve our services</li>
                        <li>Comply with legal obligations</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Data Security</h2>
                    <p class="mb-4">
                        We have implemented appropriate security measures to prevent your personal data from being
                        accidentally lost, used, or accessed in an unauthorized way. We limit access to your personal
                        data to those employees, agents, contractors, and other third parties who have a business need
                        to know.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Your Legal Rights</h2>
                    <p class="mb-4">Under data protection laws, you have rights including:</p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>The right to access your personal data</li>
                        <li>The right to correction of your personal data</li>
                        <li>The right to erasure of your personal data</li>
                        <li>The right to object to processing of your personal data</li>
                        <li>The right to data portability</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Contact Us</h2>
                    <p class="mb-4">
                        If you have any questions about this privacy policy or our privacy practices, please contact us
                        at:
                        <br>
                        Email: privacy@{{ str_replace(['http://', 'https://', 'www.'], '', config('app.url')) }}
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection
