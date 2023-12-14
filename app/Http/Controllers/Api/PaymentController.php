<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;


class PaymentController extends Controller
{

    public function generateClientToken()
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'h7vcm998tqqpwgc3',
            'publicKey' => '68ng7wn26hrcgn6z',
            'privateKey' => '0f5a9df7ee060750d2ec33e06cce0084'
        ]);
        $clientToken = $gateway->clientToken()->generate();

        return response()->json(['clientToken' => $clientToken]);
    }

    public function processPayment(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'h7vcm998tqqpwgc3',
            'publicKey' => '68ng7wn26hrcgn6z',
            'privateKey' => '0f5a9df7ee060750d2ec33e06cce0084'
        ]);

        $nonceFromTheClient = $request->input('payment_method_nonce');

        // Aggiungi anche la logica per ottenere l'importo e altri dati dalla richiesta
        $amount = $request->input('amount');
        //$selectedData = $request->input('selected_data');

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // Il pagamento è andato a buon fine
            return response()->json(['success' => true, 'transactionId' => $result->transaction->id]);
        } else {
            // Il pagamento ha avuto un problema
            $errorMessages = [];
            foreach ($result->errors->deepAll() as $error) {
                $errorMessages[] = $error->message;
            }
            return response()->json(['success' => false, 'errors' => $errorMessages]);
        }
    }
}
