<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pseudo' => 'required|unique:users|max:25|min:3',
            'email' => 'required|unique:users|max:250',
            'password' => "required|max:250"
        ];
    }
    public function messages(){
        return [
            'pseudo.required' => 'Le pseudo est obligatoire!',
            'pseudo.unique'  => 'Ce pseudo existe déjà!',
            'pseudo.max'  => 'Le pseudo est trop long!',
            'pseudo.min'  => 'Le pseudo est trop court!',
            'email.required' => 'L\'adresse email est obligatoire!',
            'email.unique'  => 'L\'adresse email existe déjà!',
            'email.max'  => 'L\'adresse email est trop longue!',
            'password.required' => 'Le mot de passe est obligatoire!',
            'password.max'  => 'Le mot de passe est trop long!'
        ];
    }
}
