<?php

namespace Raffles\Modules\Aptoclick\Notifications\Admin;

use Raffles\Modules\Aptoclick\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUserRegistered extends Notification
{
    use Queueable;

    /**
     * The User model.
     *
     * @var User $user
     */
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user The User model.
     * 
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $user = $this->user;
        $property = $this->property;
        return (new MailMessage)
            ->subject('Nuevo Usuario registrado')
            ->greeting($notifiable->first_name.' se registró un nuevo usuario.')
            ->line('El usuario '.$user->name.' ('.$user->email.') acaba de registrarse');
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
