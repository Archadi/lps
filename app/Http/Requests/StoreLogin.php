<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogin extends FormRequest
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
            'pseudo' => 'required|exists:users,pseudo|max:25|min:3',
            'password' => "required|max:250"
        ];
    }

    public function messages(){
        return [
            'pseudo.required' => 'Le pseudo est obligatoire!',
            'pseudo.exists'  => 'Ce pseudo n\'existe pas!',
            'pseudo.max'  => 'Le pseudo est trop long!',
            'pseudo.min'  => 'Le pseudo est trop court!',
            'password.required' => 'Le mot de passe est obligatoire!',
            'password.max'  => 'Le mot de passe est trop long!'
        ];
    }
}
