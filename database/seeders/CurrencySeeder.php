<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/currencies.json'));

        collect(json_decode($json))->each(function ($currency) {
            Currency::create([
                'name' => $currency->name,
                'code' => $currency->code,
                'symbol' => $currency->symbol,
                'symbol_native' => $currency->symbolNative,
                'decimal_digits' => $currency->decimalDigits,
                'rounding' => $currency->rounding,
                'plural' => $currency->namePlural,
            ]);
        });
    }
}
