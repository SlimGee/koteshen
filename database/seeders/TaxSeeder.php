<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::all()->each(function ($business) {
            Tax::factory(rand(1, 4))->create([
                'business_id' => $business->id,
            ]);
        });
    }
}
