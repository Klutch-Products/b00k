<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'biography',
        'birth_date',
        'nationality',
        'profile_image'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'books');
    }

    // access the image URL
    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' .  $this->profile_image);
        }
        return asset('images/default-author.jpg'); // default author image
    }
}
