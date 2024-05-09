<?php

namespace Database\Factories;

use App\Enum\EstimateStatus;
use App\Models\Client;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estimate>
 */
class EstimateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'business_id' => 1,
            'number' => null,
            'date' => $this->faker->date(),
            'expires_in' => 'custom',
            'expires_at' => $this->faker->date(),
            'currency_id' => Currency::factory(),
            'client_id' => Client::factory(),
            'subtotal' => $this->faker->randomFloat(2, 0, 1000),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'purchase_order' => $this->faker->word,
            'status' => $this->faker->randomElement(EstimateStatus::cases()),
            'description' => $this->faker->realText(100),
        ];
    }
}
