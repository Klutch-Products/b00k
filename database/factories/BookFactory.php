<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a unique seed for consistent image per book
        $seed = substr(md5($this->faker->unique()->uuid()), 0, 8);

        // Book categories with corresponding Unsplash search terms
        $categories = [
            'Fiction' => 'fantasy-book',
            'Non-fiction' => 'library-book',
            'Science' => 'science-book',
            'History' => 'vintage-book',
            'Technology' => 'modern-book',
        ];

        $category = $this->faker->randomElement(array_keys($categories));
        $searchTerm = $categories[$category];

        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->isbn13(),
            'publication_date' => $this->faker->date(),
            'category' => $category,
            'pages' => $this->faker->numberBetween(100, 1000),
            'cover_image' => $this->getBookCoverUrl($searchTerm, $seed),
            'price' => $this->faker->randomFloat(2, 9.99, 99.99),
            'is_featured' => $this->faker->boolean(20),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Get a book cover URL using various fallback options.
     */
    private function getBookCoverUrl(string $searchTerm, string $seed): string
    {
        $width = 400;
        $height = 600;

        // Primary source: Unsplash with specific search term and seed
        $unsplashUrl = "https://source.unsplash.com/random/seed-{$seed}-{$width}x{$height}/?{$searchTerm}";

        // Fallback options if needed
        $fallbackOptions = [
            "https://picsum.photos/seed/{$seed}/{$width}/{$height}", // Lorem Picsum
            "https://via.placeholder.com/{$width}x{$height}/e2e8f0/1a202c?text=Book+Cover", // Placeholder
        ];

        return $unsplashUrl;
    }

    /**
     * Indicate that the book is featured.
     */
    public function featured(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * Set a specific category for the book.
     */
    public function category(string $category): static
    {
        return $this->state(fn(array $attributes) => [
            'category' => $category,
        ]);
    }

    /**
     * Set the book as recently published.
     */
    public function recent(): static
    {
        return $this->state(fn(array $attributes) => [
            'publication_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ]);
    }
}
