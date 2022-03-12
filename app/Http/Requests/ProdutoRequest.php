<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProdutoRequest extends FormRequest
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
            'nome'               => 'required|max:60',
            'sku'                => 'required|max:60|min:4|unique:produtos,sku,'.$this->id,
            'quantidade_inicial' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O nome possui limite máximo de 60 caracteres',
            'sku.required'  => 'O sku é obrigatório', 
            'sku.max' => 'O sku possui limite máximo de 20 caracteres', 
            'sku.min' => 'O sku deve conter no mínimo 4 caracteres', 
            'sku.unique'=> 'Sku informado já existe no sistema',
            'quantidade_inicial.required' => 'A quantidade inicial é obrigatória'
        ];
    }
}
