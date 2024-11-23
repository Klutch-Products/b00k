<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Book Model
 *
 * This class represents the Book entity in the application.
 * It manages book-related data and relationships with other entities.
 */
class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     *
     * title - The book's title
     * author_id - The ID of the book's author
     * description - Book description/summary
     * isbn - International Standard Book Number
     * publication_date - Date of publication
     * category - Book category
     * pages - Number of pages
     * cover_image - Path to the book's cover image
     * price - Book's price
     * is_featured - Whether the book is featured
     */
    protected $fillable = [
        'title',
        'author_id',
        'description',
        'isbn',
        'publication_date',
        'category',
        'pages',
        'cover_image',
        'price',
        'is_featured'
    ];

    /**
     * The attributes that should be cast to specific types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'publication_date' => 'date',
        'pages' => 'integer',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the full URL for the book's cover image
     * Returns null if no cover image is set
     *
     * @return string|null
     */
    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        return null;
    }

    /**
     * Define the relationship between Book and Author
     * Each book belongs to one author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Define the relationship between Book and Tags
     * Many-to-Many relationship through the book_tag pivot table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Define the relationship between Book and Categories
     * Many-to-Many relationship through the book_category pivot table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Check if a specific column exists in the books table
     * Useful for dynamic queries and schema checks
     *
     * @param string $column The column name to check
     * @return bool True if the column exists, false otherwise
     */
    public static function hasColumn(string $column): bool
    {
        try {
            return Schema::hasColumn('books', $column);
        } catch (\Exception $e) {
            return false;
        }
    }
}
