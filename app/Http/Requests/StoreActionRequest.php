<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreActionRequest extends FormRequest
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
            'probleme' => 'required',
            'action' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'probleme.required' => 'Le champ problème est obligatoire.',
            'action.required' => 'Le champ action est obligatoire.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['error' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
