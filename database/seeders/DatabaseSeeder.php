<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
        ]);
    }
}

// class UserSeeder extends Seeder
// {
//     public function run(): void
//     {
//         User::factory(5)->create();

//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//     }
// }

// class BookSeeder extends Seeder
// {
//     public function run(): void
//     {
//         Book::factory(10)->create();
//     }
// }
