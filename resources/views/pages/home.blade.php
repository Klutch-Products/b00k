@extends('layouts.app')


@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4">
        <h1>Welcome to Homepage</h1>

        @include('components.cards.basic', [
            'title' => 'Featured Content',
            'content' => 'Your content here'
        ])
    </div>
@endsection

@push('scripts')
<script>
    // Page specific scripts
</script>
@endpush


