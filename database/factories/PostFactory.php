<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(rand(5, 10), true),
            'user_id' => rand(1, User::count()),
            'content' => $this->faker->paragraph(),
            'image' => 'default_picture' . rand(1, 5) . 'jpg',
        ];
    }
}
