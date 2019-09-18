<?php

namespace Raffles\Modules\Aptoclick\Mail;

use Raffles\Modules\Aptoclick\Models\{PropertyCondition, PropertyType};

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValorizeMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The form data.
     *
     * array $data
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param  array $data The form data.
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $this->_mapData($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.valorize')
            ->subject('Solicitud de valorización de inmueble')
            ->with(['data' => $this->data]);
    }

    private function _mapData($data)
    {
        $propertyConditions = PropertyCondition::pluck('name', 'id')->toArray();
        $propertyTypes = PropertyType::pluck('name', 'id')->toArray();

        return [
            'Nombre' => $data['name'],
            'Email' => $data['email'],
            'Teléfono' => $data['phone'],
            'Tipología' => $propertyTypes[$data['property_type_id']],
            'Estado conservación' => $propertyConditions[$data['property_condition_id']],
            'Edad del inmueble (años)' => $data['years'],
            'Calle' => $data['address']['street_name'],
            'Número exterior' => $data['address']['street_number'],
            'Nº de piso o planta' => $data['address']['floor_number'],
            'Estado' => $data['address']['state'],
            'Municipio/Alcaldía' => $data['address']['locality'],
            'Localidad/Colonia' => $data['address']['sublocality'],
            'C.P.' => $data['address']['zip'],
            'Recámaras' => $data['rooms'],
            'Baños completos' => $data['bathrooms'],
            'Elevador' => $data['elevator'],
            'Lugares de estacionamiento' => $data['parking'],
            'Superficie construida (m2)' => $data['covered_surface'],
            'Superficie de terreno (m2)' => $data['ground_surface'],
        ];
    }
}
