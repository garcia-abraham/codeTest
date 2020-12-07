<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FormRequestResponse;

class RegisterUserRequest extends FormRequest
{
    use FormRequestResponse;

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
            'city' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'string|required',
            'industry' => 'required|string',
            'organization' => 'string|required',
            'position' => 'string|nullable',
            'email' => 'required|email|unique:users,email',
            'event_info' => 'string|required',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ];
    }
}
