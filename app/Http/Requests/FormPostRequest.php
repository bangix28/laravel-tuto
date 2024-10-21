<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:2'],
            'slug' => ['required', 'min:2', 'max:255', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'content' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.min' => 'Le titre doit comporter au moins 2 caractères.',
            'slug.required' => 'Le champ slug est obligatoire.',
            'slug.min' => 'Le slug doit comporter au moins 2 caractères.',
            'slug.max' => 'Le slug ne peut pas dépasser 255 caractères.',
            'slug.unique' => 'Le slug a déjà été pris.',
            'content.required' => 'Le champ contenu est obligatoire.',
        ];
    }
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'data' => null,
            'status' => 'Erreur de validation',
            'message' => 'erreur lors de l\'insertion des données requises',
            'validation' => $validator->errors()
        ], 422 ));
    }

}
