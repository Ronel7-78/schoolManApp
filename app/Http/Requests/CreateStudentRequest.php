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
            'gender'=>'required',
            'codeCl'=>'required|string|exists:sujets,codeCl',
            'contactP'=>'required|min:9',
            'newOld'=>'required',
            'montantDue'=>'required|integer|exists:sujets,montantDue',
            'montantVerse'=>'required',
            'resteV'=>'required',
            //'photoE'=>'required|max:2048'
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
                'gender.required'=>'The gender is required',
                'newOld.required'=>'This chields is required',
                'montantDue.required'=>'The school fees is required',
                'montantVerse.required'=>'This chields is required',
                'resteV.required' => 'The rest  is required',

                //'photoE.required' => 'The picture of the student is required.',

                //'photoE.max' => 'The image size must be less than 2MB.'


            ];
        }
}
