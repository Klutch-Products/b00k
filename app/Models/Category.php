<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Category Model
 *
 * This model represents book categories in the application.
 * Categories can be assigned to multiple books and books can belong to multiple categories
 * through a many-to-many relationship.
 */
class Category extends Model
{
    // Enables factory support for database testing
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Define many-to-many relationship with Book model
     *
     * This relationship allows:
     * - A category to be associated with multiple books
     * - A book to have multiple categories
     * - Uses the pivot table 'book_category' by convention
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
