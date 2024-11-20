<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'nomEl'=>'required|string|max:255',
            'prenomEl'=>'required|string|max:255',
            'dateNais'=>'required|date',
            'lieuNais'=>'required|string|max:255',
            'codeCl'=>'required|string|exists:sujets,codeCl',
            'contactP'=>'required|min:9',
            'newOld'=>'required',
            'montantVerse'=>'required',
            'resteV'=>'required',
            'datePay'=>'required|date',
            'photoEl'=>'required'
        ];
    }

        // message personnalisé en fonction des differentes erreurs
        public function messages() {
            return [
                'nomEl.required' => ' The name is required ',
                'prenomEl.required' => 'The Subname is required ',
                'dateNais.required' => 'The Birth day is required ',
                'lieuNaiss.min' => ' The place of birth is required.',
                'codeCl.required' => ' The class code address is required ',
                'contactP.required'=>' This phone number of parent\'s is required ',
                'newOld.required'=>'This chields is required',
                'montantVerse.required'=>'This chields is required',
                'resteV.required' => 'The rest  is required',
                'datePay.required' => 'The date of the payement is required',
                'photoEl.required' => 'The picture of student is required'

            ];
        }
}
