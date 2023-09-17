<?php

namespace App\Notifications;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SubscriptionExpiredNotification extends Notification
{
    use Queueable;
    public $subscription;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    
    public function toMail($notifiable)
    {
        
        return (new MailMessage)
                    ->subject('Subscription Expired')
                    ->line('Your Xoflix subscription of '.$this->subscription->plan->name.' '.$this->subscription->duration.' Month'.' has expired.')
                    ->action('Buy New Subscription', route('subscription'))
                    ->line('Thank you for using Xoflix!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
        return [
            'subject' => 'Subscription Expired',
            'body' => 'Your Xoflix subscription of '.$this->subscription->plan->name.' '.$this->subscription->duration.' Month'.' has expired',
            'url'=> route('subscription')
        ];
    }
}
