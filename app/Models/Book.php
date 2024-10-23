<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 */
class Book extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['title', 'author', 'description', 'published_at'];

    /**
     * @var string[]
     */
    protected $casts = [
        'published_at' => 'date',
    ];
}
