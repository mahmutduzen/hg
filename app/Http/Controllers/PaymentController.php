<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\Config;
use App\Odeme;
use App\Sepet;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PHPUnit\TextUI\ResultPrinter;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    //
    private $_api_context;

    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $total = 0;
        $x = 1;
        $item_list = new ItemList();
        $sepet2 = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();

            foreach($sepet2->sepeturun as $spturun){
                foreach($spturun->urun as $urun){
                    $total+= $urun->fiyat;
                    $item_1 = new Item();

                    $item_1->setName($urun->baslik)
                        ->setCurrency('EUR')
                        ->setQuantity(1)
                        ->setPrice($urun->fiyat);
                    $item_list->addItem($item_1);
                }
            }

        if (request('not')){
            $sepet2->not = request('not');
        }
        $sepet2->toplamucret = $total;
        $sepet2->save();
        $odeme = new Odeme();
        $odeme->sepet_id = $sepet2->id;
        $odeme->durum = 1;
        $odeme->toplamucret = $total;
        $odeme->odemesekli = 1;
        $odeme->adres_id = request('adres_id');
        $odeme->save();

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');

            } else {

                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');

    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::put('error', 'Payment failed');
            return Redirect::to('/sepetcheck');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            Session::put('success', 'Payment success');
            return redirect('/basari')->with('success', 'Payment success!');

        }

        Session::put('error', 'Payment failed');
        return Redirect::to('/zahlunggenehmigung');

    }

    public function basari(){
        if ($mesaj = Session::get('success')){
            $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
            if ($sepet){
                $odeme = Odeme::where('sepet_id', '=' ,$sepet->id)->first();
                if ($odeme){
                    $odeme->durum = 2;
                    $odeme->save();
                }
                $sepet->durum = 0;
                $sepet->save();
                return Redirect::to('/basarili');
            }
        }
        return Redirect::to('/zahlunggenehmigung');
    }


    public function payWithRechnung(Request $request)
    {
        $total = 0;
        $x = 1;
        $sepet2 = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();

        foreach($sepet2->sepeturun as $spturun){
            foreach($spturun->urun as $urun){
                $total+= $urun->fiyat;
            }
        }

        if (request('not')){
            $sepet2->not = request('not');
        }
        $sepet2->toplamucret = $total;
        $sepet2->save();
        $odeme = new Odeme();
        $odeme->sepet_id = $sepet2->id;
        $odeme->durum = 1;
        $odeme->toplamucret = $total;
        $odeme->odemesekli = 2;
        $odeme->adres_id = request('adres_id');
        $odeme->save();

        if ($odeme){
            Session::put('rechnung', 'Payment success');
            $sepet = Sepet::where([['durum', '=',1],['kullanici_id','=',Auth::id()]])->first();
            if ($sepet){
                $odeme = Odeme::where('sepet_id', '=' ,$sepet->id)->first();
                if ($odeme){
                    $odeme->durum = 2;
                    $odeme->save();
                }
                $sepet->durum = 0;
                $sepet->save();
                return Redirect::to('/basarili');
            }
        }else{
            Session::put('error', 'Payment failed');
        }
        return back();
    }

}

