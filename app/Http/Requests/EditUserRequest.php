<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
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
            'admin_user' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_user.required' => 'Informe um nome válido!',
            'name_user.min' => 'Nome informado muito curto!',
        ];
    }
}
