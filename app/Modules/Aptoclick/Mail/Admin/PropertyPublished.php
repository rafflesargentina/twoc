<?php

namespace Raffles\Modules\Aptoclick\Mail\Admin;

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
     * @var Property
     * @var User
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
        return $this->markdown('aptoclick::emails.admin.property-published')
            ->subject('Nueva propiedad publicada')
            ->with(['property' => $this->property, 'user' => $this->user]);
    }
}
