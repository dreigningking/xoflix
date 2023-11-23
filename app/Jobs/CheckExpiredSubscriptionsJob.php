<?php

namespace App\Jobs;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\SubscriptionExpiredNotification;
use App\Notifications\SubscriptionExpiringNotification;

class CheckExpiredSubscriptionsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    
        $expireds = Subscription::whereIn('plan_id',['1','2'])->expired()->get();
        $expirings = Subscription::whereIn('plan_id',['1','2'])->expiring()->get();
        foreach($expireds as $expired){
            $expired->user->notify(new SubscriptionExpiredNotification($expired));
        }
        foreach($expirings as $expiring){
            $expiring->user->notify(new SubscriptionExpiringNotification($expiring));
        }
    }
}
