<?php

namespace Raffles\Modules\Aptoclick\Http\Requests;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest as FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to store action.
     *
     * @return array
     */
    public static function store()
    {
        if (request()->featured_photo) {
            return [
                'featured_photo[]' => 'image|max:1024',
            ];
        }

        if (request()->unfeatured_photos) {
            return [
                'unfeatured_photos[]' => 'image|max:1024',
            ];
        }

        return [
            'address.country' => 'required',
            'address.floor_number' => 'nullable|numeric',
            'address.locality' => 'required',
            'address.state' => 'required',
            'address.street_name' => 'required',
            'address.street_number' => 'nullable|numeric',
            'address.sublocality' => 'nullable',
            'address.zip' => 'nullable',
            'amenities' => 'array',
            'bathrooms' => 'required|numeric',
            'contact.email' => 'required|email',
            'contact.fax' => '',
            'contact.mobile' => 'required',
            'contact.phone' => 'required',
            'covered_surface' => 'required|numeric',
            'days_available' => 'required',
            'description' => 'required',
            'facilities' => 'array',
            'floors' => 'numeric',
            'ground_surface' => 'required',
            'hours_available' => 'required',
            'maintenance_expenses' => 'numeric',
            'parking' => 'numeric',
            'property_condition_id' => 'required',
            'property_type_id' => 'required',
            'rental_price' => 'numeric',
            'sell_price' => 'required|numeric|min:600000|max:60000000',
            'title' => 'required',
        'years' => 'numeric|max:50',
        ];
    }

    /**
     * Get the validation rules that apply to updateaction.
     *
     * @return array
     */
    public static function update()
    {
        return self::store();
    }    
}
