<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreCafRequest extends FormRequest
{
    public function wantsJson()
    {
        return true;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dateCaf' => 'required',
            'personne' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dateCaf.required' => 'Le champ date Caf est obligatoire.',
            'personne.required' => 'Le champ personne est obligatoire.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['error' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
