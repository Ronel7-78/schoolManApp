<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileAdminRequest extends FormRequest
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
            'nom' =>'required|min: 4',
            'prenom' =>'required|min: 4',
            'email' =>'required|email',
            'telephone' =>'required|min: 9',
            'password'=>'required|min:8',
            'current_password' => 'required',
        ];
    }

    // message personnalisé en fonction des differentes erreurs
    public function messages() {
        return [
            'nom.required' => ' The name is required ',
            'nom.min' => 'The name must be at least 4 characters long',
            'prenom.required' => 'The Subname is required ',
            'prenom.min' => ' The Subname must be at least 4 characters long',
            'email.required' => ' Email address is required ',
            'email.unique'=>' This email address is already taken, enter another one valid ',
            'telephone.required'=>'The phone number is required ',
            'telephone.min'=>'The phone number must be at least 9 characters long ',
            'password.required' => 'The password is required',
            'password.min' => 'The password must be at least 8 characters long',
            'current_password.required' => 'The confirmation of current password do not match !! ' ,

        ];
    }
}
