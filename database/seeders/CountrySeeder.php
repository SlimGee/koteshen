<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/countries.json'));

        collect(json_decode($json))->each(function ($country) {
            Country::create([
                'name' => $country->name,
                'code' => $country->code,
                'dial_code' => $country->dial_code,
            ]);
        });
    }
}
