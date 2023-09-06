<?php
namespace App\Http\Traits;

use App\Models\Payout;
use App\Http\Traits\PaypalTrait;
use App\Http\Traits\PaystackTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\FlutterwaveTrait;

trait PayoutTrait
{
    use FlutterwaveTrait,PaystackTrait,PaypalTrait;

    protected function initializePayout(Payout $payout){
        $user = $payout->user;
        $gateway = $user->country->payout_gateway;
        switch($gateway){
            case 'paystack': $this->payoutPaystack($payout);
            break;
            case 'flutterwave': $this->payoutFlutterWave($payout);
            break;
            case 'paypal': $this->payoutPaypal($payout);
            break;
            case 'stripe': $this->payoutStripe($payout);
            break;
        }
    }

    protected function verifyPayout(Payout $payout){
        $gateway = $payout->user->country->payout_gateway;
        switch($gateway){
            case 'paystack': $this->verifyPayoutPaystack($payout);
            break;
            case 'flutterwave': $this->verifyPayoutFlutterwave($payout);
            break;
            case 'paypal': $this->verifyPayoutPaypal($payout);
            break;
            case 'stripe': $this->verifyPayoutStripe($payout);
            break;
        }
        //save to paid/failed
        
    }

    protected function retryPayout(Payout $payout){
        $user = $payout->user;
        $gateway = $user->country->payout_gateway;
        switch($gateway){
            case 'paystack': $this->retryPayoutPaystack($payout);
            break;
            case 'flutterwave': $this->retryPayoutFlutterWave($payout);
            break;
            case 'paypal': $this->retryPayoutPaypal($payout);
            break;
            case 'stripe': $this->retryPayoutStripe($payout);
            break;
        }
        //save to paid/failed
    }

    
    
    

    
    

    

}