<?php

namespace Raffles\Modules\Aptoclick\Mail;

use Raffles\Modules\Aptoclick\Models\{ Property, User };

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PropertyPublished extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Property and User models.
     * 
     * @var Property $property
     * @var User     $user
     */
    protected $property, $user;

    /**
     * Create a new message instance.
     *
     * @param Property $property The Property model.
     * @param User     $user     The User model.
     *
     * @return void
     */
    public function __construct(Property $property, User $user)
    {
        $this->property = $property;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = \Carbon\Carbon::today()->format('Y-m');

        return $this->markdown('aptoclick::emails.property-published')
            ->attach(
                '/var/www/aptoclick.com/app/Modules/Aptoclick/Resources/Attachments/CONTRATO_DE_PRESTACION_DE_SERVICIOS_DE_MEDIACION_EN_RENTA_INMOBILIARIA_DEF_SIN_IVA.pdf', [
                'mime' => 'application/pdf'
                ]
            )
            ->subject('Contrato de mediación renta inmobiliaria')
            ->with(
                ['property' => $this->property,
                'user' => $this->user,
                'date' => $date,
                ]
            );
    }
}
