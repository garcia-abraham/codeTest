<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:4',
            'last_name' => 'required|string|min:4',
            'dni' => 'required|numeric|min:7',
            'birthdate' => 'required',
            'credit_card' => 'required|string|min:4'


        ];
    }

    public function messages()
    {
        return [
            'first_name.min' => 'Minimo 4 caracteres',
            'last_name.min' => 'Minimo 4 caracteres',
            'dni.min' => 'Ingrese su dni correctamente',
            'birthdate.date' => 'Formato de fecha invalido',
            'credit_card.min' => 'Ingrese su dni correctamente'

        ];
    }
}
