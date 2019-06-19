<?php

/**
 * Get the Nexmo / SMS representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return NexmoMessage
 */

function toNexmo($notifiable)
{
    return (new NexmoMessage)
                ->content('Sua mensagem foi enviada!');
}