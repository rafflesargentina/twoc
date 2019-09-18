<?php

namespace Raffles\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification implements ShouldQueue
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
                    ->subject('Bienvenido a '.env('APP_NAME'))
		    ->greeting('Estimado '.$notifiable->first_name)
		    ->greeting('¡Bienvenido a Aptoclick!')
                    ->line('Te invitamos a registrar tu inmueble haciendo click en el siguiente botón.')
		    ->action('Publica tu inmueble', url('/properties/create'))
		    ->line('¿Quieres más información? Concreta una cita telefónica hoy mismo para que una operadora te explique en detalle el funcionamiento de la plataforma, a través del siguiente link: https://calendly.com/cita_avaluo_inmobiliario/explicacion-aptoclick');
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
