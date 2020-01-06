<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Basket;
use App\Models\Factor;
use App\Models\Feature;
use App\Models\ProductView;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Tagend;
use SoapClient;
use Carbon\carbon;
use App\Services\FactorService;
use App\Services\SmsService;


class CheckoutController extends Controller
{
    public function getAddress()
    {
        $basket = FactorService::_getUserBasket();
        if($basket->products->count() == 0){
            return redirect('/');
        }

        $meta = [
            'title' => config('setting-general.default_meta_title') . ' | ' . __('address'),
            'description' => config('setting-general.default_meta_description'),
            'keywords' => '',
            'image' => asset(config('setting-general.default_meta_image')),
            'google_index' => config('setting-general.google_index'),
            'canonical_url' => url()->current(),
        ];

        return view('front.components.checkout.address', ['basket' => $basket, 'meta' => $meta]);
    }

    public function getAddressInit()
    {
        $addresses = \Auth::user()->addresses()->orderBy('id', 'desc')->get()->toArray();
    	return [
    		'addresses' =>  $addresses,
    	];
    }

    public function postAddress(Request $request)
    {
		$address_id = $request->address_id;
		$user_description = $request->user_description;

        $old_factor = Factor::currentFactor()
            ->first();
        if($old_factor)
        {
            $old_factor->address_id = $address_id;
            $old_factor->user_description = $user_description;
            $old_factor->total_price = FactorService::_getTotalPrice();
            $old_factor->status = Factor::STATUS_INITIAL;
            $old_factor->save();
            $factor = $old_factor;
        }
        else
        {
    		$new_factor_model = [
    		    'user_id' => \Auth::id(),
                'address_id' => $address_id,
    		    'user_description' => $user_description,
                'admin_seen' => 0,
                'status' => Factor::STATUS_INITIAL,
    	        'total_price' => FactorService::_getTotalPrice(),
            ];
            $factor = Factor::create($new_factor_model);
        }

        $factor->fillFactorProducts();
        $factor->fillFactorTagends();        
        $factor->total_price = $factor->calculateTotalPriceWithTagends();
        $factor->save();

        return json_encode([
            'status' => 1,
            'message' => 'فاکتور با موفقیت ذخیره شد.',
            'data' => $factor->id,
        ]);
    }

    public function getShipping()
    {
        $factor = Factor::currentFactor()->first();
        if(!$factor){
            return redirect('/');
        }
        
        $shippings = Tagend::shipping()->get();

        return view('user.checkout.shipping', compact('factor', 'shippings'));
    }

    public function postShipping(Request $request)
    {
        $factor = Factor::currentFactor()->first();

        if($factor->shipping)
        {
            $factor->detachShippings();
        }
        $tagend_shipping = Tagend::where('title', $request['shipping'])->first();
        $factor->tagends()->syncWithoutDetaching([
            $tagend_shipping->id => [
                'value' => $tagend_shipping->value,
            ]
        ]);

        $factor->shipping = $request['shipping'];
        $factor->total_price = $factor->calculateTotalPriceWithTagends();
        $factor->save();

        return redirect('/checkout/payment');
    }

    public function postDiscount(Request $request)
    {
        $code = $request->code;

        $tagend = Tagend::copon()
            ->where('code', $code)
            ->where('used_count', '>', 0)
            ->first();

        if($tagend)
        {
            // todo
            // age ke in baba ye code takhfif zade bood dge natone code dge i bezane
            $factor = Factor::currentFactor()->first();
            $factor->addTagendToFactor($tagend);
            $factor->total_price = $factor->calculateTotalPriceWithTagends();
            $factor->save();

            $tagend->used_count = $tagend->used_count - 1;
            $request->session()->flash('alert-success', 'کد تخفیف اعمال شد.');
        }else{
            $request->session()->flash('alert-danger', 'کد تخفیف اشتباه است.');
        }
        return redirect()->back();
    }    

    public function getPayment()
    {
        $factor = Factor::currentFactor()->first();
        if($factor){
            return view('user.checkout.payment', compact('factor'));
        }else{
            return redirect('/');
        }
    }

    public function getPaymentLocal()
    {        
        $factor = Factor::currentFactor()->first();

        if(!$factor){
            \Log::error('getPaymentLocal + factor does not exist');
            return redirect('/');
        }

        if($factor->total_price < 1000){
            $factor->total_price = 1000;
            $factor->save();
        }
        FactorService::_decreaseInventory();
        $factor->payment = Factor::PAYMENT_LOCAL;
        $factor->status = Factor::STATUS_PROCCESSING;
        $factor->save();
        $view_status = 'local';
            
        $basket = FactorService::_getUserBasket();
        $basket->products()->detach();
        $basket->delete();

        $sms_service = new SmsService();
        $sms_service->shopping($factor);

        return view('user.checkout.verify', compact('view_status', 'factor'));
    }

    public function getPaymentOnline($bank)
    {
        $factor = Factor::currentFactor()->first();
        if(!$factor){
            \Log::error('getPaymentOnline + factor does not exist');
            return redirect('/');
        }

        if($factor->total_price < 100){
            dd('لطفا با شماره ۰۹۱۰۶۸۰۱۶۸۵ تماس بگیرید و بگویید مشکل "قیمت اشتباه" رخ داده است. سریعا مشکل رفع می شود');
            \Log::warning('لطفا با شماره ۰۹۱۰۶۸۰۱۶۸۵ تماس بگیرید و بگویید مشکل "قیمت اشتباه" رخ داده است. سریعا مشکل رفع می شود');
        }
        $factor->payment = Factor::PAYMENT_ONLINE;
        $factor->status = Factor::STATUS_PAYMENT;
        $factor->save();

        $payment = Payment::create([
            'user_id' => \Auth::id(),
            'factor_id' => $factor->id,
            'user_ip' => \Request::ip(),
            'total_price' => $factor->total_price,
            'status' => Payment::STATUS_SEND_BANK,
            'Invoice_date' => date('now'),
            'description' => 'در حال ورود به بانک',
            'bank' => $bank,
        ]);
        \Log::info('going to bank factor_id: '.$factor->id.' by user_id: ' .\Auth::id() 
            .'with payment_id: '.$payment->id );
                
        try{
            if($bank == 'zarinpal'){
                $gateway = \Gateway::ZARINPAL();
                $gateway->setDescription('سفارش از فروشگاه اینترنتی');
                $gateway->setEmail(\Auth::user()->email);
                $gateway->setMobileNumber(\Auth::user()->phone);
            }elseif($bank == 'mellat'){
                $gateway = \Gateway::Mellat();
            }

            $gateway->setCallback(url('checkout/payment/verify'));
            $gateway->price( (10 * $factor->total_price) )->ready();

            $refId =  $gateway->refId(); // شماره ارجاع بانک
            $transID = $gateway->transactionId(); // شماره تراکنش
            
            $payment->refId = $refId; // 000000000000000000000000000072078672
            $payment->transaction_id = $transID; // 152420075508
            $payment->save();
            return $gateway->redirect();
            
        } catch (\Exception $e) {
            $payment->status = Payment::STATUS_UNSUCCEED;
            $payment->error = $e->getMessage();
            $payment->description = 'اطلاعات بانک تو سیستم غلط است';
            $payment->save();
            \Log::error('اطلاعات بانک اشتباه رخ داده است.' );
            dd( $e->getMessage() );
        }
    }

    public function getPaymentVerify(Request $request)
    {
        /*
        bank mellat
        "http://holooyarshop.ir/checkout/payment/verify
            ?transaction_id=152787598384
            &_token=vPVqfrLyQtwaXYAQHJw3C4PtvjpWw24t8u9lcnNG"
        
        zarin pall
        "http://ariotel.com/checkout/payment/verify
            ?Authority=000000000000000000000000000076220683
            &Status=NOK"
        */

        $Authority = $request->Authority;
        $transaction_id = $request->transaction_id;
        if($Authority)
        {
            $payment = Payment::Mine()
                ->where('refId', $Authority)
                ->orderBy('id','desc')
                ->first();
        }elseif($transaction_id){
            $payment = Payment::Mine()
                ->where('transaction_id', $transaction_id)
                ->orderBy('id','desc')
                ->first();
        }else{
            dd('لینک این صفحه را حتما ذخیره نمایید و گزارش کنید.');
        }
        if(!$payment){
            dd('پرداخت به مشکل خورده است شما با این کد به بانک نرفته اید!');
        }
       
        $factor = $payment->factor;
        $Amount = $payment->total_price;

        try { 
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();

            $payment->tracking_code = $trackingCode;
            $payment->refId = $refId;
            $payment->card_number = $cardNumber;
            $payment->description = 'با موفقیت پرداخت شد.';
            $payment->status = Payment::STATUS_SUCCEED;
            
            $factor->status = Factor::STATUS_PROCCESSING;
            $view_status = 'success';
            FactorService::_decreaseInventory();
            

        } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {
            if($payment->status == Payment::STATUS_SUCCEED){
                $view_status = 'success';
            }else{
                $view_status = 'error';
            }
            return view('user.checkout.verify', compact('view_status', 'factor') );

        } catch (\Exception $e) {
            \Log::warning('user canceled: by payment_id: '. $payment->id );
            $payment->status = Payment::STATUS_UNSUCCEED;
            $payment->error = $e->getMessage();
            $payment->description = 'پرداخت ناموفق بوده است';
            $view_status = 'error';
        }
        $payment->save();
        $factor->save();
        if($view_status == 'success'){
            $sms_service = new SmsService();
            $sms_service->shopping($factor);
        }
        
        $basket = FactorService::_getUserBasket();
        $basket->products()->detach();
        $basket->delete();
        
        return view('user.checkout.verify', compact('view_status', 'factor') );
    }
}
