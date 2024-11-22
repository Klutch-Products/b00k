<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Database\Factories\BookFactory;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()
            ->count(50)
            ->create();

        Book::factory()
            ->count(10)
            ->featured()
            ->create();
    }
}
