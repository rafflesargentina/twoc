<?php

namespace Raffles\Modules\Aptoclick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'contact.phone.phone'  => 'El teléfono ingresado no es un número válido de México.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->user();

        return [
            'contact.fax' => 'nullable|phone:mx',
            'contact.mobile' => 'required|phone:mx',
            'contact.phone' => 'required|phone:mx',
            'curp' => 'required',
            'email' => [
                'required',
                Rule::unique($user->getTable())->ignore($user->id),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'rfc' => 'required',
        ];
    }
}
