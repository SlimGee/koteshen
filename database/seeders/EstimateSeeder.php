<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Estimate;
use Illuminate\Database\Seeder;

class EstimateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::all()->each(function (Client $client) {
            Estimate::factory(10)
                ->for($client->business)
                ->create([
                    'currency_id' => $client->currency_id,
                    'client_id' => $client->id,
                ]);
        });
    }
}
