<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_user' => 'required|min:4',
            'email_user' => 'required|email|unique:users,email_user',
            'admin_user' => 'required',
            'password_user' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'name_user.required' => 'Informe um nome válido!',
            'name_user.min' => 'Nome informado muito curto!',
            'email_user.required' => 'Informe um e-mail válido!',
            'email_user.email' => 'Informe um e-mail válido!',
            'email_user.unique' => 'E-mail já cadastrado!',
            'admin_user.required' => 'Informe a permissão de admin!',
            'password_user.required' => 'Informe uma senha válida!',
            'password_user.min' => 'Informe uma senha com no mínimo 3 dígitos!',
        ];
    }
}
