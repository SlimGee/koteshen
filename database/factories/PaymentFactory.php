<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 0, 9999999999999999.99),
            'paid_at' => $this->faker->dateTime(),
            'business_id' => null,
            'user_id' => null,
            'client_id' => null,
            'reference' => $this->faker->uuid(),
            'channel' => $this->faker->word(),
            'currency' => $this->faker->currencyCode(),
        ];
    }
}
