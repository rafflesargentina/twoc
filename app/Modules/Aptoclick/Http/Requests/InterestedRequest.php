<?php

namespace Raffles\Modules\Aptoclick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestedRequest extends FormRequest
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
            'birth_date' => 'required|date',
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|phone:mx',
            'rfc' => 'required',
        ];
    }
}
