<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CheckoutNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($htrans)
    {
        $this->htrans = $htrans;
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
        // return ['database'];
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
            ->greeting('Menggu Pembayaran')
            ->from('baboweofficial@gmail.com', 'Babowe Official')
            ->line('Menunggu pembayaran transaksi sewa anda sebesar '.$this->htrans->hSewa_total.' ke rekening BCA 7880067997 atas nama PT. Babowe Indonesia. Jangan lupa tuliskan berita : "top up : '.$this->htrans->user->user_email.'"')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
            "msg" => "Menunggu pembayaran"
        ];
    }
}
