<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Earning;
use App\Models\Payment;
use App\Models\Setting;
use App\Notifications\ReferralEarningNotification;
use App\Notifications\SubscriptionPaymentNotification;
use Illuminate\Support\Arr;

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
            if($user->payments->where('status','success')->count() == 1 && $user->referred_by){
                $setting = Setting::where('name','referral_bonus_percentage')->first()->value;
                $referrer = User::find($user->referred_by);
                $price = Arr::first($payment->subscriptions->first()->plan->prices, function ($value, $key) use($payment) {
                    return intval($value['label']) == $payment->subscriptions->first()->duration;
                });
                $bonus = $setting * $price['description'] / 100;
                $referrer->balance += $bonus;
                $referrer->save();
                $earning = Earning::create(['user_id'=> $user->referred_by,'referred_id' => $user->id,'amount'=> $bonus]);
                $referrer->notify(new ReferralEarningNotification($earning));
            }
            foreach($payment->subscriptions as $subscription){
                if($subscription->end_at){
                    $subscription->start_at = null;
                    $subscription->save();
                }    
            }
            $payment->user->notify(new SubscriptionPaymentNotification($payment));
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
