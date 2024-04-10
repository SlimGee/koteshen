<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(100)->create([
            'business_id' => Business::first()->id,
        ]);
    }
}
