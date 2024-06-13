<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'default_picture' . rand(1, 5) . 'jpg',
            'name' => $this->faker->name(),
            'gender' => $this->faker->name(),
            'race' => $this->faker->name(),
            'content' => $this->faker->paragraph(),
            'skill_id' => rand(1, Skill::count()),
        ];
    }
}
