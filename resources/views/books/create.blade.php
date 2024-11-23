<div class="mb-4">
    <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
    <select name="author_id" id="author_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        <option value="">Select an Author</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
</div>