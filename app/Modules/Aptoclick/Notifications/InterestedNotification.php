<?php

namespace Raffles\Modules\Aptoclick\Notifications;

use Raffles\Modules\Aptoclick\Models\Property;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InterestedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The form data.
     *
     * @var array
     */
    protected $data;

    /**
     * The Property model.
     *
     * @var Property
     */
    protected $property;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data, Property $property)
    {
        $this->data = $data;
        $this->property = $property;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $greeting = 'Hay alguien interesado en la propiedad "'.$this->property->title.'"';
        $line1 = 'Datos del interesado: ';
        $line2 = 'Nombre: '.$this->data['first_name'].' '.$this->data['last_name'];
        $line3 = 'Email: '.$this->data['email'];
        $line4 = 'Teléfono: '.$this->data['phone'];
        $line5 = 'RFC: '.$this->data['rfc'];
        $line6 = 'Fecha de nacimiento: '.\Carbon\Carbon::parse($this->data['birth_date'])->format('d/m/Y');
        $url = env('APP_URL').'/propiedades/'.$this->property->id;
        return (new MailMessage)
            ->subject($greeting)
            ->greeting($greeting)
            ->line($line1)
            ->line($line2)
            ->line($line3)
            ->line($line4)
            ->line($line5)
            ->line($line6)
            ->action('Ver propiedad', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
