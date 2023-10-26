<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmpruntsRequest extends FormRequest
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
            'id_livre' => ['required', 'integer'],
            'id_etudiant' => ['required', 'integer'],
            'date_emprunt' => ['required', 'date'],
            'date_retour_prevue' => ['required', 'date'],
            'date_retour_effective' => ['date', 'nullable'],
        ];
    }
}
