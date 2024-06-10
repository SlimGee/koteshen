<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Jackiedo\Cart\Facades\Cart;

class SubscriptionController extends Controller
{
    use CreatesInvoices;

    public function create(): Renderable
    {
        Meta::prependTitle('Select a plan');

        return view('app.subscription.create', [
            'plans' => Plan::all(),
        ]);
    }

    public function store(Plan $plan): RedirectResponse
    {
        if (auth()->user()->subscriptions()->count() === 0) {
            auth()->user()->subscribe($plan);

            return redirect()->intended(route('app.home.index'))->with('success', 'You have started your free trial');
        }

        Cart::addItem([
            'id' => $plan->id,
            'title' => $plan->name,
            'quantity' => 1,
            'price' => $plan->price,
        ]);

        return redirect()->route('checkout');
    }
}
