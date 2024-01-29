<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Subscription;
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
        $payments = Payment::where('status','pending')->where('created_at','<',now()->subDay())->get();
        foreach($payments as $payment){
            $payment->subscription()->delete();
            $payment->delete();            
        }
        Subscription::whereDoesntHave('payment')->delete();
        
    }
}
