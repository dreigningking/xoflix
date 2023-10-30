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
                    ->greeting('Dear '.$notifiable->name)
                    ->line($this->message())
                    ->action('Dashboard', route('dashboard'))
                    ->line('Thank you for using Xoflix!');
    }

    public function message(){
        switch($this->payment->status){
            case 'success': return "Payment of ".$this->payment->amount." naira has been confirmed. Subscription information will be shared with you shortly";
                break;
            case 'paid': return "We acknowledge the receipt of your payment in the amount of ".$this->payment->amount." made on ".$this->payment->created_at->format('d-M-Y')." Your transaction reference number is: ".$this->payment->reference.". Please note that this payment is currently pending confirmation. Once the confirmation is complete, we will send you a confirmation notice.";
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
