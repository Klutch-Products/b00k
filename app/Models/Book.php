<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Book extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'author',
        'description',
        'isbn',
        'publication_date',
        'category',
        'pages',
        'cover_image'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'publication_date' => 'date',
        'pages' => 'integer',
    ];

    // Helper method to get cover image URL

    /**
     * @return string|null
     */
    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        return null;
    }
}
