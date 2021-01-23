<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'name_subcategory' => 'required|min:2',
            'parent_subcategory' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'name_subcategory.required' => 'Informe um nome válido!',
            'name_subcategory.min' => 'Nome informado muito curto!',
            'parent_subcategory.required' => 'Informe uma categoria válida',
        ];
    }
}
