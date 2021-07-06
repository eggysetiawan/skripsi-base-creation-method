<?php

namespace App\Notifications;

use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;
    public $schedule;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('willy@mail.com', 'Willy Photo.')
            ->greeting('Hai ' . $this->schedule->photographer->name . '! Kamu memiliki Pesanan baru')
            ->line('Segera berikan tanggapan berupa persetujuan/pembatalan untuk Pesanan yang dibuat!')
            ->subject('Job Foto dari Willy!')
            ->action('Lihat Pesanan', route('schedules.show', $this->schedule->id))
            ->line('Terimakasih sudah menggunakan aplikasi kami!');
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
            //
        ];
    }
}
