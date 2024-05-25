<?php

namespace App\Http\Controllers\Billing\Concerns;

use App\Enum\ClientType;
use App\Enum\InvoiceStatus;
use App\Models\Currency;
use App\Services\PrimaryBusiness;
use Flixtechs\Subby\Models\Plan;

trait CreatesInvoices
{
    public function createInvoice(Plan $plan)
    {
        $user = auth()->user();

        $items = collect([
            [
                'name' => 'Subscription for ' . $plan->name . ' plan',
                'quantity' => 1,
                'price' => $user->subscriptions()->count() !== 0 ? $plan->price : $plan->signup_fee,
                'total' => $user->subscriptions()->count() !== 0 ? $plan->price : $plan->signup_fee,
            ],
        ]);

        $client = PrimaryBusiness::get()->clients()->updateOrCreate([
            'email' => $user->email,
        ], [
            'first_name' => explode(' ', $user->name)[0],
            'last_name' => explode(' ', $user->name)[1] ?? '',
            'address' => '123 Street',
            'city' => 'City',
            'country' => 'Country',
            'type' => ClientType::INDIVIDUAL,  // 'individual' or 'company
            'currency_id' => Currency::where('code', 'USD')->first()->id,
        ]);

        $invoice = PrimaryBusiness::get()->invoices()->create([
            'due_at' => now(),
            'subtotal' => $items->sum('price'),
            'total' => $items->sum('price'),
            'balance' => $items->sum('price'),
            'due_in' => 'custom',
            'date' => now(),
            'client_id' => $client->id,
            'currency_id' => $client->currency_id,
            'status' => InvoiceStatus::DRAFT,
            'number' => null,
        ]);

        $invoice->items()->createMany($items->toArray());

        return $invoice;
    }
}
