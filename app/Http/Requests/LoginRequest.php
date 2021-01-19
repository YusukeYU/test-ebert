<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email_user' => 'required|email',
            'password_user' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email_user.required' => 'Informe um e-mail válido',
            'email_user.email' => 'Informe um e-mail válido',
            'password_user.required' => 'Informe uma senha válida'
        ];
    }
}
