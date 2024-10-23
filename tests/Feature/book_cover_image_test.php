<?php
//TODO: RUN TESTS
//TODO: CURL Shell Scripts HTTP
use App\Models\Book;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(/**
 * @return void
 */ function () {
    Storage::fake('public');
});

it(/**
 * @return void
 */ 'stores book cover image correctly and makes it accessible', function () {
    // Arrange
    $file = UploadedFile::fake()->image('book_cover.jpg');
    $bookData = [
        'title' => 'Test Book',
        'author' => 'Test Author',
        'description' => 'Test Description',
        'cover_image' => $file
    ];

    // Act
    $response = $this->post(route('books.store'), $bookData);

    // Assert
    $response->assertRedirect();
    $response->assertSessionHas('success', 'Book created successfully');

    // Get the created book
    $book = Book::latest()->first();

    // Check if the file exists in the correct location
    Storage::disk('public')->assertExists("book-covers/{$book->cover_image}");

    // Check if the file is accessible via the browser
    $this->get("/storage/book-covers/{$book->cover_image}")
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'image/jpeg');

    // Optionally, check if the image URL in the book record is correct
    $expectedUrl = "/storage/book-covers/{$book->cover_image}";
    $this->assertEquals($expectedUrl, Storage::url($book->cover_image));
});

it(/**
 * @return void
 */ 'updates book cover image correctly', function () {
    // Arrange
    $book = Book::factory()->create();
    $file = UploadedFile::fake()->image('new_book_cover.jpg');
    $updateData = [
        'title' => 'Updated Book Title',
        'author' => 'Updated Author',
        'cover_image' => $file
    ];

    // Act
    $response = $this->put(route('books.update', $book), $updateData);

    // Assert
    $response->assertRedirect();
    $response->assertSessionHas('success', 'Book updated successfully');

    // Refresh the book from the database
    $book->refresh();

    // Check if the new file exists in the correct location
    Storage::disk('public')->assertExists("book-covers/{$book->cover_image}");

    // Check if the new file is accessible via the browser
    $this->get("/storage/book-covers/{$book->cover_image}")
        ->assertSuccessful()
        ->assertHeader('Content-Type', 'image/jpeg');
});

it(/**
 * @return void
 */ 'deletes old cover image when updating', function () {
    // Arrange
    $oldFile = UploadedFile::fake()->image('old_cover.jpg');
    $book = Book::factory()->create(['cover_image' => $oldFile->store('book-covers', 'public')]);
    $newFile = UploadedFile::fake()->image('new_cover.jpg');

    // Act
    $response = $this->put(route('books.update', $book), [
        'title' => $book->title,
        'author' => $book->author,
        'cover_image' => $newFile
    ]);

    // Assert
    $response->assertRedirect();
    $book->refresh();

    // Check that the old file is gone and the new file exists
    Storage::disk('public')->assertMissing($book->getOriginal('cover_image'));
    Storage::disk('public')->assertExists("book-covers/{$book->cover_image}");
});
