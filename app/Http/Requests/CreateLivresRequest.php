<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLivresRequest extends FormRequest
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
            'titre' => ['required', 'min:2', 'max:50'],
            'auteur' => ['required', 'min:2', 'max:50'],
            'resume' => ['required', 'min:2'],
            'disponibilite' => ['required', 'min:5'],
            'localisation' => ['required', 'min:2'],
        ];
    }
}
