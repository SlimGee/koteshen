<?php

namespace App\Http\Controllers\Public\Invoice;

use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     *
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     *
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function test()
    {
        $data = [
            'amount' => 500,
            'reference' => '4g4g5485g8545jg8gj',
            'email' => 'given@flixtechs.co.zw',
            'currency' => 'ZAR',
            'orderID' => 23456,
        ];

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}