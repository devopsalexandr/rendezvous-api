<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class FormRequest extends BaseFormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'errors' => $validator->errors()
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
