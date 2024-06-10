<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;
use NagSamayam\Promocodes\Models\Promocode;

class RedeemCouponController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'promo' => 'required|string|exists:promocodes,code',
        ]);

        $promo = Promocode::findByCode($data['promo'])->firstOrFail();

        Cart::applyAction([
            'id' => 1,
            'group' => 'Discount',
            'title' => "Discount {$promo->getDetail('percent_off')}%",
            'value' => "-{$promo->getDetail('percent_off')}%",
            'extra_info' => [
                'description' => 'Discount',
            ],
        ]);

        return back()->with('success', 'You have applied this promo code');
    }
}
