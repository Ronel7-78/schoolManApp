<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassesRequest extends FormRequest
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
            'codeCl' =>'required|min: 2',
            'nomCl' =>'required|min: 5',
        ];
    }

    // message personnalisé en fonction des differentes erreurs
    public function messages() {
        return [
            'codeCl.required' => 'The code is required',
            'codeCl.min' => 'The code class must be at least 9 characters long',
            'nomCl.required' => 'The class name is required',
            'nomCl.min' => 'The class name must be at least 5 characters long',

        ];
    }
}
