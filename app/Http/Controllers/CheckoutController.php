<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use Butschster\Head\Facades\Meta;
use Flixtechs\Subby\Models\Plan;
use Jackiedo\Cart\Facades\Cart;

class CheckoutController extends Controller
{
    use CreatesInvoices;

    public function create()
    {
        Meta::prependTitle('Checkout');

        $cart = Cart::name('default');

        return view('checkout.create', [
            'cart' => $cart,
        ]);
    }

    public function store()
    {
        $id = collect(Cart::getItems())->last()->get('id');

        $plan = Plan::find($id);

        Cart::clearItems();

        return to_route('app.billing.payments.redirect', [
            $this->createInvoice($plan),
            $plan,
        ]);
    }
}
