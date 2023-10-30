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


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->message())
                    ->action('Dashboard', route('dashboard'))
                    ->line('Thank you for using Xoflix!');
    }

    public function message(){
        switch($this->payment->status){
            case 'success': return "Payment of ".$this->payment->amount." naira has been confirmed. Subscription information will be shared with you shortly";
                break;
            case 'paid': return "Your payment submission of ".$this->payment->amount." naira was successful. Please wait for confirmation of payment or contact support";
                break;
            default: return "Your payment of ".$this->payment->amount." naira failed. Please contact support";
                break;
        }
    }

    public function toArray($notifiable)
    {
        
        return [
            'subject' => 'Payment Info',
            'body' => $this->message(),
            'url'=> route('dashboard')
        ];
    }
}
