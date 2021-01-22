<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name_product' => 'required|min:2',
            'real' => 'required|max:8|',
            'cents' => 'required|max:2',
            'des_product' => 'required|max:200',
            'photo_product' => 'required|image|',
        ];
    }
    public function messages()
    {
        return [
            'name_product.required' => 'Informe um nome válido!',
            'name_product.min' => 'Nome informado muito curto!',
            'real.required' => 'Informe um valor em reais válido!',
            'real.max' => 'Valor em reais muito alto!',
            'cents.required' => 'Informe um valor em centavos válido!',
            'cents.max' => 'Valor em centavos fora do padrão!',
            'des_product.required' => 'Informe uma descrição!',
            'des_product.max' => 'Informe uma descrição menor!',
            'photo_product.required' => 'Necessário anexar uma foto!',
            'photo_product.image' => 'Arquivo anexado não é uma imagem!',
        ];
    }
}
