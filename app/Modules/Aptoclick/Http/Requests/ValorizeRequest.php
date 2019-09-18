<?php

namespace Raffles\Modules\Aptoclick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValorizeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.phone'  => 'El teléfono ingresado no es un número válido de México.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accepted' => 'required|accepted',
            'address.country' => 'required',
            'address.locality' => 'required',
            'address.state' => 'required',
            'address.street_name' => 'required',
            'address.street_number' => 'required',
            'address.sublocality' => 'required',
            'address.zip' => 'required',
            'bathrooms' => 'required',
            'covered_surface' => 'required|numeric|min:20',
            'elevator' => 'required',
            'email' => 'required',
            'ground_surface' => 'required|numeric|min:20',
            'parking' => 'required',
            'name' => 'required',
            'property_condition_id' => 'required',
            'property_type_id' => 'required',
            'rooms' => 'required',
            'years' => 'required|numeric|min:0|max:150',
        ];
    }
}
