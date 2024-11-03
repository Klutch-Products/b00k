@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Terms of Service</h1>
            <div class="prose max-w-none text-gray-700">
                <p class="mb-4">Last updated: {{ date('F d, Y') }}</p>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. Agreement to Terms</h2>
                    <p class="mb-4">
                        By accessing our website at {{ config('app.url') }}, you agree to be bound by these terms of
                        service and agree that you are responsible for compliance with any applicable local laws.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Use License</h2>
                    <p class="mb-4">Permission is granted to temporarily download one copy of the materials (information
                        or software) on {{ config('app.name') }}'s website for personal, non-commercial transitory
                        viewing only.</p>
                    <p class="mb-4">This is the grant of a license, not a transfer of title, and under this license you
                        may not:</p>
                    <ul class="list-disc pl-6 mb-4">
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose</li>
                        <li>Attempt to decompile or reverse engineer any software contained on the website</li>
                        <li>Remove any copyright or other proprietary notations from the materials</li>
                        <li>Transfer the materials to another person or 'mirror' the materials on any other server</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Disclaimer</h2>
                    <p class="mb-4">
                        The materials on {{ config('app.name') }}'s website are provided on an 'as is'
                        basis. {{ config('app.name') }} makes no warranties, expressed or implied, and hereby disclaims
                        and negates all other warranties including, without limitation, implied warranties or conditions
                        of merchantability, fitness for a particular purpose, or non-infringement of intellectual
                        property or other violation of rights.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Limitations</h2>
                    <p class="mb-4">
                        In no event shall {{ config('app.name') }} or its suppliers be liable for any damages
                        (including, without limitation, damages for loss of data or profit, or due to business
                        interruption) arising out of the use or inability to use the materials
                        on {{ config('app.name') }}'s website.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Accuracy of Materials</h2>
                    <p class="mb-4">
                        The materials appearing on {{ config('app.name') }}'s website could include technical,
                        typographical, or photographic errors. {{ config('app.name') }} does not warrant that any of the
                        materials on its website are accurate, complete, or current.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Links</h2>
                    <p class="mb-4">
                        {{ config('app.name') }} has not reviewed all of the sites linked to its website and is not
                        responsible for the contents of any such linked site. The inclusion of any link does not imply
                        endorsement by {{ config('app.name') }} of the site.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">7. Modifications</h2>
                    <p class="mb-4">
                        {{ config('app.name') }} may revise these terms of service for its website at any time without
                        notice. By using this website, you are agreeing to be bound by the then current version of these
                        terms of service.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">8. Contact Us</h2>
                    <p class="mb-4">
                        If you have any questions about these Terms of Service, please contact us at:
                        <br>
                        Email: legal@{{ str_replace(['http://', 'https://', 'www.'], '', config('app.url')) }}
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection
