<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::all()->each(function ($invoice) {
            for ($i = 0; $i < 10; $i++) {
                $invoice->payments()->create([
                    'amount' => $invoice->total,
                    'business_id' => $invoice->business_id,
                    'user_id' => $invoice->user_id,
                    'client_id' => $invoice->client_id,
                    'reference' => Str::uuid(),
                    'channel' => 'cash',
                    'currency' => $invoice->currency->code,
                ]);
            }
        });
    }
}
