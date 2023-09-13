<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use App\Http\Traits\FlutterwaveTrait;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CheckFailedPaymentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,FlutterwaveTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $payments = Payment::where('status','pending')->where('created_at','<',now()->subMinutes(15))->get();
        foreach($payments as $payment){
            $details = $this->verifyFlutterWavePayment($payment->reference);
            if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
                $payment->status = 'failed';
                $payment->save();
            }else{
                $payment->status = 'success';
                $payment->method = $details->data->payment_type;
                $payment->save();
            }
            
        }
    }
}
