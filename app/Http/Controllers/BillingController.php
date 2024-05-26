<?php

namespace App\Http\Controllers;

use App\Services\PrimaryBusiness;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;

class BillingController extends Controller
{
    public function edit(): Renderable
    {
        Meta::prependTitle('Billing');

        $client = PrimaryBusiness::get()
            ->clients()
            ->where('email', auth()->user()->email)
            ->first();

        if (is_null($client)) {
            $payments = collect([]);
        } else {
            $payments = $client
                ->payments()
                ->orderBy('created_at', 'desc')
                ->paginate();
        }

        $cards = auth()->user()->cards;

        return view('app.billing.edit', [
            'user' => auth()->user(),
            'cards' => $cards,
            'payments' => $payments,
        ]);
    }
}
