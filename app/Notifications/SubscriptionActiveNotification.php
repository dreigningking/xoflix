<?php

namespace App\Notifications;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SubscriptionActiveNotification extends Notification
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
                    ->line('Subscription details for '.$this->subscription->plan->name.' '.$this->subscription->duration.' Month'.' is as follows:')
                    ->line('Xtream Username: '.$this->subscription->xtream_username)
                    ->line('Xtream Password: '.$this->subscription->xtream_password)
                    ->line('Xtream Link: '.$this->subscription->xtream_link)
                    ->line('M3u Link: '.$this->subscription->m3u_link)
                    ->action('View Dashboard', route('dashboard'))
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
            'subject' => 'Subscription Details',
            'body' => 'Subscription details for '.$this->subscription->plan->name.' '.$this->subscription->duration.' Month'.' is ready',
            'url'=> route('dashboard')
        ];
    }
}
