<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "category_id" => Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
            "user_id" => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            "title" => $this->faker->title(),
            "body" => $this->faker->text(),
        ];
    }
}
