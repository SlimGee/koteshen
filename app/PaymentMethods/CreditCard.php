<?php

namespace App\PaymentMethods;

use App\Facades\Aux\ExchangeRates;
use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use Flixtechs\Subby\Contracts\PaymentMethodService;
use Flixtechs\Subby\Traits\IsPaymentMethod;
use Unicodeveloper\Paystack\Facades\Paystack;

class CreditCard implements PaymentMethodService
{
    use CreatesInvoices, IsPaymentMethod;

    public const TRIES = 1;

    public const TIMEOUT = 120;

    public function test()
    {
        return 'Credit Card';
    }

    public function charge()
    {
        $user = ($this->planSubscriptionSchedule ?? $this->planSubscription)->subscriber;  // Assuming the user has a default card
        $card = $user->defaultCard;

        if (!is_null($card)) {
            // Email the user to update their card details
            return;
        }

        $details = Paystack::chargeAuthorization([
            'email' => $card->email,
            'amount' => round($this->amount * ExchangeRates::against('ZAR')) * 100,
            'authorization_code' => $card->authorization_code,
        ])->getResponse();

        if ($details['status'] !== true) {
            // Email the user to update their card details
            return;
        }

        $subscripton = ($this->planSubscriptionSchedule ?? $this->planSubscription);
        $subscripton->load('plan');

        $invoice = $this->createInvoice($subscripton->plan, $subscripton->subscriber);

        $invoice->payments()->create([
            'amount' => ($details['data']['amount'] / 100) / ExchangeRates::against('ZAR'),
            'paid_at' => now(),
            'channel' => $details['data']['channel'],
            'reference' => null,
            'currency' => $invoice->currency->code,
            'business_id' => $invoice->business_id,
            'user_id' => auth()->id(),
            'client_id' => $invoice->client_id,
        ]);

        if ($details['data']['authorization']['reusable']) {
            $user->cards()->updateOrCreate(['signature' => $details['data']['authorization']['signature']],
                [
                    'email' => $user->email,
                    ...$details['data']['authorization'],
                ]);
        }
    }
}
