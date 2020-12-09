<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class RegisterProductRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'provider' => 'required|string|min:4',
            'brand' => 'required|string|min:4',
            'price' => 'required|numeric|min:2',
            'expiration_date' => 'required',
            'quantity' => 'required|numeric|min:1'


        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Minimo 4 caracteres',
            'provider.min' => 'Minimo 4 caracteres',
            'brand.min' => 'Minimo 4 caracteres',
            'price.min' => 'Ingrese precio correctamente',
            'expiration_date.required' => 'Ingrese Fecha',
            'quantity.min' => 'Ingrese cantidad correctamente'

        ];
    }
}
