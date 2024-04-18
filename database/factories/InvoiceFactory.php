<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Client;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->numerify('INV-###'),  // 'INV-###
            'client_id' => Client::factory(),
            'business_id' => Business::factory(),
            'currency_id' => Currency::first()->id,
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'due_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement(['draft', 'sent', 'paid']),
            'balance' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
