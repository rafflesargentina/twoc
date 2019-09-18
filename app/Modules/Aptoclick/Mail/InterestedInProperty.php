<?php

namespace Raffles\Modules\Aptoclick\Mail;

use Raffles\Modules\Aptoclick\Models\Property;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterestedInProperty extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Property model.
     * 
     * @var Property $property
     */
    protected $property;

    /**
     * The form data.
     *
     * @var array $data
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param Property $property The Property model.
     * @param array    $data     The form data.
     *
     * @return void
     */
    public function __construct(Property $property, $data)
    {
        $this->property = $property;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('aptoclick::emails.interested-in-property')
            ->subject('Tu solicitud fue enviada.')
            ->with(['property' => $this->property, 'data' => $this->data]);
    }
}
