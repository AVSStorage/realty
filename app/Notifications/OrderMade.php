<?php

namespace App\Notifications;

use App\Mail\OrderSuggest;
use App\Orders;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderMade extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Orders $order)
    {
        $this->order = $order;
        $this->user = User::find($order->getAttribute('user_id'));
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return OrderSuggest
     */
    public function toMail($notifiable)
    {
        return (new OrderSuggest($this->order))
            ->to($this->user->getAttribute('email'));
    }

}
