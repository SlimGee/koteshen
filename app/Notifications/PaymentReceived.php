<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceived extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Payment $payment)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Payment Receipt ' . $this->payment->currency . ' ' . $this->payment->amount)
            ->greeting('Hello, ' . $notifiable->name)
            ->line('This is your receipt for payment of the amount ' . $this->payment->currency . ' ' . $this->payment->amount)
            ->line('I really appreciate your business!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Payment Receipt ' . $this->payment->currency . ' ' . $this->payment->amount,
            'body' => 'This is your receipt for payment of the amount ' . $this->payment->currency . ' ' . $this->payment->amount,
            'url' => route('app.payments.show', $this->payment),
        ];
    }
}
