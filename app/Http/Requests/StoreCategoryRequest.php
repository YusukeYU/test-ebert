<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name_category' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return [
            'name_category.required' => 'Informe um nome válido!',
            'name_category.min' => 'Nome informado muito curto!',
        ];
    }
}
