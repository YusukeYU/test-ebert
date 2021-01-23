<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name_product' => 'required|min:2',
            'real' => 'required',
            'des_product' => 'required|max:200',
            'photo_product' => 'nullable|mimes:jpeg,png,jpg|max:1524',
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'Informe um nome válido!',
            'name_product.min' => 'Nome informado muito curto!',
            'real.required' => 'Informe um valor em reais válido!',
            'real.max' => 'Valor em reais muito alto!',
            'des_product.required' => 'Informe uma descrição!',
            'des_product.max' => 'Informe uma descrição menor!',
            'photo_product.mimes' => 'O arquivo deve ser jpeg,png ou jpg!',
        ];
    }
}
