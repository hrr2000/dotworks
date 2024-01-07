<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\User\Invoice;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalPaymentController extends Controller
{

    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);
        $amount = $request->amount;

        $product = [];
        $product['items'] = [
            [
                'name' => 'Deposit Money',
                'price' => $amount,
                'desc'  => 'Deposit Money To Dotworks Website',
                'qty' => 1
            ]
        ];

        $product['invoice_id'] = '1';
        $product['invoice_description'] = "Order #{$product['invoice_id']} Deposit Operation";
        $product['return_url'] = route('frontend.wallet.deposit.payment.paypal.confirm');
        $product['cancel_url'] = route('frontend.wallet.deposit.payment.paypal.confirm');
        $product['total'] = $amount;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        if(!$res['paypal_link']) return view('frontend.user_panel.wallet.deposit.amount');
        return redirect($res['paypal_link']);

    }

    public function confirm(Request $request) {

        $oldInvoice = Invoice::where('token', $request['token'])->get();

        if($oldInvoice->first())
            return redirect(route('frontend.wallet.deposit.amount'));

        $paypalModule = new ExpressCheckout();
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']) || $response['BILLINGAGREEMENTACCEPTEDSTATUS'] !== "1")
            return view('frontend.user_panel.wallet.deposit.confirm')->with(['error' => 'Payment process is failed!']);

        $user = auth()->user();
        $user->balance += $response['AMT'];

        $invoice = new Invoice([
            'client_id' => $user->id,
            'provider_id' => 0,
            'process_type' => 'deposit',
            'service_id' => 0,
            'amount' => 1,
            'total' => $response['AMT'],
            'state' => 'complete',
            'method' => 'paypal',
            'token' => $response['TOKEN']
        ]);

        try {
            $invoice->save();
            $user->save();
        } catch (\Exception $exception) {
            return view('frontend.user_panel.wallet.deposit.confirm')->with(['error' => 'Payment process is failed!']);
        }

        return view('frontend.user_panel.wallet.deposit.confirm')->with(['success' => 'Paid Successfully.']);



    }

}
