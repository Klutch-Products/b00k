<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'biography' => $this->faker->paragraph(3),
            'birth_date' => $this->faker->date(),
            'nationality' => $this->faker->country,
        ];
    }
}