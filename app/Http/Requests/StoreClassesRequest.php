<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassesRequest extends FormRequest
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
            'codeCl' =>'required|min: 2|unique:sujets,codeCl',
            'nomCl' =>'required|min: 5|unique:sujets,nomCl',
        ];
    }

      // message personnalisé en fonction des differentes erreurs
      public function messages() {
        return [
            'codeCl.required' => 'The code is required',
            'codeCl.min' => 'The code class must be at least 9 characters long',
            'codeCl.unique'=>'This code class is already exists, please choose a different one',
            'nomCl.required' => 'The class name is required',
            'nomCl.min' => 'The class name must be at least 5 characters long',
            'nomCl.unique'=>'This class name is already exists, please choose a different one',
        ];
    }
}
