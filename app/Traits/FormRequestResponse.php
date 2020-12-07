<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FormRequestResponse
{
    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json(["errors" => $validator->errors()->all()], 412)); 
    }
}