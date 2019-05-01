<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreConfigurationRequest extends FormRequest
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
            'categorie' => 'required|max:20|alpha',
            'champ' => 'required|max:20|alpha',
            'libelle' => 'required|max:20|alpha',
        ];
    }

    public function messages()
    {
        return [
            'categorie.required' => 'Le champ catégorie est obligatoire.',
            'champ.required' => 'Le champ champ est obligatoire.',
            'libelle.required' => 'Le champ libellé est obligatoire.',
            'categorie.max' => 'La catégorie ne peut pas dépasser 20 caractères.',
            'champ.max' => 'Le champ ne peut pas dépasser 20 caractères.',
            'libelle.max' => 'Le libellé ne peut pas dépasser 20 caractères.',
            'categorie.alpha' => 'La catégorie ne peut contenir que des lettres.',
            'champ.alpha' => 'Le champ ne peut contenir que des lettres.',
            'libelle.alpha' => 'Le libellé ne peut contenir que des lettres.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['error' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
