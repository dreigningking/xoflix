<?php

namespace App\Listeners;

use App\Models\Payment;
use App\Models\Withdrawal;
use App\Events\FlutterwaveWebhookEvent;

class FlutterwaveWebhookListener
{
    
    public function __construct()
    {
        //  
    }

    
    public function handle(FlutterwaveWebhookEvent $event)
    {
        //deposit, withdrawal(flutterwave transfer)
        $hook = json_decode($event->webhook->body);
        $amount = $hook->data->amount;
        
        $currency = 'NGN';
        switch($hook->event){
            case 'charge.completed':
                if(strtolower($hook->data->status) == "successful"){
                    $payment = Payment::where('reference',$hook->data->tx_ref)->where('status','!=','success')->first();
                    if($payment){
                        $payment->status = 'success';
                        $payment->save();
                    }
                }else{
                    $payment = Payment::where('reference',$hook->data->tx_ref)->first();
                    if($payment){
                        $payment->status = 'failed';
                        $payment->save();
                    }
                }
                $event->webhook->status = true;
                $event->webhook->save();
                break;
            case 'transfer.completed':
                if(strtolower($hook->data->status) == "successful"){
                    $withdrawal = Withdrawal::where('reference',$hook->data->id)->where('status','!=','success')->first();
                    if($withdrawal){
                        $withdrawal->status = 'success';
                        $withdrawal->save();
                    }
                }else{
                    $withdrawal = Withdrawal::where('reference',$hook->data->id)->first();
                    if($withdrawal){
                        $withdrawal->status = 'failed';
                        $withdrawal->save();
                    }
                }
                $event->webhook->status = true;
                $event->webhook->save();
                break;
            default:
                break;
        }
    }
}
