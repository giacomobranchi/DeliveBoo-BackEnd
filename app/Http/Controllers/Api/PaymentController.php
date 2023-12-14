<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;


class PaymentController extends Controller
{

    public function processPayment()
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'h7vcm998tqqpwgc3',
            'publicKey' => '68ng7wn26hrcgn6z',
            'privateKey' => '0f5a9df7ee060750d2ec33e06cce0084'
        ]);
        $clientToken = $gateway->clientToken()->generate([
            "customerId" => $aCustomerId
        ]);
    }
}
