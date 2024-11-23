<?php

namespace App\Models;

use Schema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'isbn',
        'publication_date',
        'category',
        'pages',
        'cover_image',
        'publisher_id',
        'pdf_path',
        'price',
        'is_featured'

    ];

    protected $casts = [
        'publication_date' => 'date',
        'pages' => 'integer',
        'is_featured' => 'boolean',
    ];

    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        return null;
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public static function hasColumn(string $column): bool
    {
        try {
            return Schema::hasColumn('books', $column);
        } catch (\Exception $e) {
            return false;
        }
    }


}

