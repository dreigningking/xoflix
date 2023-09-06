<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Earning;
use App\Models\Payment;
use App\Models\Setting;

class PaymentObserver
{
    /**
     * Handle the Payment "created" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "updated" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        if($payment->isDirty('status') && $payment->status == 'success'){
            $user = $payment->user;
            if($user->payments->count() == 1 && $user->referred_by){
                $setting = Setting::where('name','referral_bonus_percentage')->first()->value;
                $referrer = User::find($user->referred_by);
                $bonus = $setting * $payment->amount / 100;
                $referrer->bonus += $bonus;
                $referrer->save();
                Earning::create(['user_id'=> $user->referred_by,'referred_id' => $user->id,'amount'=> $bonus]);
            }
        }
    }

    /**
     * Handle the Payment "deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}
