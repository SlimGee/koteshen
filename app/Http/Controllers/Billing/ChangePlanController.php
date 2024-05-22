<?php

namespace App\Http\Controllers\Billing;

use App\Enum\ClientType;
use App\Enum\InvoiceStatus;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use App\Services\PrimaryBusiness;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ChangePlanController extends Controller
{
    public function create(): Renderable
    {
        $plans = Plan::all();

        return view('app.billing.create', ['plans' => $plans]);
    }

    public function store(Plan $plan): RedirectResponse
    {
        $user = User::find(auth()->id());

        if ($user->isSubscribedTo($plan->id)) {
            return redirect()->route('app.billing.edit')->with('error', 'You are already subscribed to this plan!');
        }

        $items = collect([
            [
                'name' => 'Subscription for ' . $plan->name . ' plan',
                'quantity' => 1,
                'price' => $user->subscribed() ? $plan->signup_fee : $plan->price,
                'total' => $user->subscribed() ? $plan->signup_fee : $plan->price,
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

        return redirect()->route('app.billing.payments.redirect', [$invoice, $plan]);
    }
}
