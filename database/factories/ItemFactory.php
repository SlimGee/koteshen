<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
