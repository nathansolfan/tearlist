<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'tier' => $this->faker->randomElement(['s', 'a', 'b', 'c', 'd', 'e']),
            'deadline' => Carbon::now()->addDays($this->faker->numberBetween(1, 15)),
            'created_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 10)),
        ];
    }
}
