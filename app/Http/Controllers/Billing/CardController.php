<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\RedirectResponse;

class CardController extends Controller
{
    public function destroy(Card $card): RedirectResponse
    {
        $card->delete();

        return back()->with('success', 'You have removed this card');
    }
}
