<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\VoiceChannel;
use App\Channels\Messages\VoiceMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
     public function via($notifiable)
     {
         return [VoiceChannel::class];
     }
 
     /**
      * Get the voice representation of the notification.
      *
      * @param  mixed  $notifiable
      * @return VoiceMessage
      */
     public function toVoice($notifiable)
     {
         // ...
     }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toMail($notifiable)
     {
        $url = url('/invoice/'.$this->invoice->id);

         return (new MailMessage)
                ->greeting('Olá!')
                ->line('Seus produtos foram baixados!')
                ->action('Visualizar produtos', $url)
                ->line('Obrigado por usar nossa plataforma!');
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
            'from' => ['address' => 'example@example.com', 'name' => 'App Name'],
            'reply_to' => ['address' => 'example@example.com', 'name' => 'App Name']
        ];
    }

}
