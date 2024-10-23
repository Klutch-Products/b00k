<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->isbn13,
            'publication_date' => $this->faker->date(),
            'category' => $this->faker->randomElement(['Fiction', 'Non-fiction', 'Science', 'History', 'Technology']),
            'pages' => $this->faker->numberBetween(100, 1000),
            'cover_image' => $this->faker->imageUrl(300, 400, 'books'),
        ];
    }
}
