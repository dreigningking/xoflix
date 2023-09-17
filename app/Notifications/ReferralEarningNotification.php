<?php

namespace App\Notifications;

use App\Models\Earning;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReferralEarningNotification extends Notification
{
    use Queueable;
    public $earning;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Earning $earning)
    {
        $this->earning = $earning;
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
                    ->line('You have earned '.$this->earning->amount.' bonus for referring '.$this->earning->referred->name)
                    ->line('Keep up the energy')
                    ->action('View Balance', route('dashboard'))
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
            'subject' => 'Referral Earning',
            'body' => 'You have earned '.$this->earning->amount.' bonus for referring '.$this->earning->referred->name,
            'url' => route('dashboard')
        ];
    }
}
