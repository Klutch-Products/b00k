<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $categories = ['Fiction', 'Non-Fiction', 'Science', 'Technology', 'Business', 'History', 'Biography'];
        return [
            'title' => $this->faker->sentence(3),
            // 'author' => $this->faker->name,
            'author_id' => Author::factory(),
            'description' => $this->faker->paragraphs(3, true),
            'isbn' => $this->faker->isbn13,
            'publication_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'category' => $this->faker->randomElement($categories),
            'pages' => $this->faker->numberBetween(100, 1000),
            'cover_image' => 'https://source.unsplash.com/random/seed-' . $this->faker->uuid . '-400x600/?modern-book',
            'price' => $this->faker->randomFloat(2, 9.99, 99.99),
            'is_featured' => $this->faker->boolean(20), // 20% chance of being featured
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Indicate that the book is featured.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
