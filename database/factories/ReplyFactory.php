<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thread;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "thread_id" => Thread::inRandomOrder()->first()->id ?? Thread::factory()->create()->id,
            "user_id" => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            "body" => $this->faker->text(),
        ];
    }
}
