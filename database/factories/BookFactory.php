<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use Illuminate\Support\Facades\Http;

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
            'cover_image' => $this->getRandomBookCover(),
        ];
    }

    private function getRandomBookCover()
    {
        $response = Http::withHeaders([
            'Authorization' => env('PEXELS_API_KEY'),
        ])->get('https://api.pexels.com/v1/search', [
            'query' => 'book cover',
            'per_page' => 1,
            'page' => rand(1, 1000), // Randomize the page to get different images
        ]);

        if ($response->successful() && isset($response['photos'][0])) {
            return $response['photos'][0]['src']['medium'];
        }

        // Fallback to a placeholder if the API call fails
        return 'https://via.placeholder.com/300x400?text=Book+Cover';
    }
}
