<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SubscriptionPaymentNotification extends Notification
{
    use Queueable;
    public $payment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
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
        if($this->payment->status == "success"){
            $status = "Payment of ".$this->payment->amount." naira has been confirmed. Subscription information will be shared with you shortly";
        }else{ 
            $status = "Payment of ".$this->payment->amount." naira has been received. Please wait for some moment for confirmation of payment or contact support";
        }
        return (new MailMessage)
                    ->line($status)
                    ->action('Dashboard', route('dashboard'))
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
        if($this->payment->status == "success"){
            $status = "Payment of ".$this->payment->amount." naira has been confirmed. Subscription information will be shared with you shortly";
        }else{ 
            $status = "Payment of ".$this->payment->amount." naira has been received. Please wait for some moment for confirmation of payment or contact support";
        }

        return [
            'subject' => 'Payment Info',
            'body' => $status,
            'url'=> route('dashboard')
        ];
    }
}
