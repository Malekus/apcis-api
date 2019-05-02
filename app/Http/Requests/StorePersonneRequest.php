<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StorePersonneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function wantsJson()
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
            'nom' => 'required|alpha',
            'prenom' => 'alpha',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => "Le champ nom est obligatoire",
            'nom.alpha' => 'Le champ nom doit contenir aucun chiffre',
            'prenom.alpha' => 'Le champ prénom doit contenir aucun chiffre'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
