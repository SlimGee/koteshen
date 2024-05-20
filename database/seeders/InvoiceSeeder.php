<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::factory()->for(Business::first())->count(10)->hasItems(7)->create();
    }
}
