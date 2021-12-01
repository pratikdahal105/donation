<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Donation\Model\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function postPaymentWithpaypal()
    {
        $data = Session::get('donation');
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $amount_get = $this->convertCurrency($data['actual_amount'], "NPR", 'USD');
        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amount_get);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amount_get);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                return Redirect::route('frontend.donation.form', Session::get('slug'))->with('error','Connection timeout');
            } else {
                return Redirect::route('frontend.donation.form', Session::get('slug'))->with('error','Some error occur, sorry for inconvenient');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        return Redirect::route('frontend.donation.form', Session::get('slug'))->with('error','Unknown error occurred');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            return Redirect::route('frontend.donation.form', Session::get('slug'))->with('error','Payment failed !!');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            $data = Session::get('donation');
            $campaign = Campaign::where('slug', Session::get('slug'))->first();
            $donation = new Donation();
            $donation['reference_no'] = $this->referenceNumber();
            $donation['slug'] = base64_encode($donation['reference_no']);
            $donation['amount'] = $data['amount'];
            $donation['remarks'] = $data['remarks'];
            $donation['tip'] = $data['actual_amount']-$data['amount'];
            $donation['user_id'] = Auth::user()->id;
            $donation['campaign_id'] = $campaign->id;
            $donation['anonymous'] = $data['anonymous'];
            if($donation->save()){
                Session::forget('donation');
                return Redirect::route('frontend.campaign.detail', Session::get('slug'))->with('success', 'Payment successful !!');
            }
        }

        return Redirect::route('frontend.campaign.detail', Session::get('slug'))->with('error','Payment failed !!');
    }

    function convertCurrency($amount,$from_currency,$to_currency){
        $apikey = 'dfd5d4cbf360ff540fbc';

        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";

        // change to the free URL if you're using the free version
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
        $obj = json_decode($json, true);

        $val = floatval($obj["$query"]);


        $total = $val * $amount;
        return number_format($total, 2, '.', '');
    }

    public function referenceNumber(){
        $reference = date("Y").uniqid();
        if(Donation::where('reference_no', $reference)->exists()){
            return $this->referenceNumber();
        }
        else{
            return $reference;
        }
    }
}
