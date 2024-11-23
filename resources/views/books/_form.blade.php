<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    <x-forms.input 
        name="title"
        label="Book Title"
        :value="$book->title"
        required
        placeholder="Enter book title"
    />

    <x-forms.input 
        name="author"
        label="Author"
        :value="$book->author"
        required
        placeholder="Enter author name"
    />

    <x-forms.textarea 
        name="description"
        label="Description"
        :value="$book->description"
        placeholder="Enter book description"
    />

    <x-forms.input 
        type="date"
        name="publication_date"
        label="Publication Date"
        :value="$book->publication_date?->format('Y-m-d')"
    />

    <x-forms.input 
        type="file"
        name="cover_image"
        label="Cover Image"
        accept="image/*"
    />

    <div class="flex justify-end space-x-3">
        <x-buttons.secondary href="{{ route('books.index') }}">
            Cancel
        </x-buttons.secondary>
        <x-buttons.primary type="submit">
            {{ $submitText ?? 'Save Book' }}
        </x-buttons.primary>
    </div>
</form>