<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

}
