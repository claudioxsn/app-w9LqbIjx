<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentacaoRequest extends FormRequest
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
            'tipo_movimentacao' => 'required',
            'produto_sku'       => 'required',
            'quantidade'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tipo_movimentacao.required' => 'Informe o tipo de movimentacao',
            'produto_sku.required'       => 'Informe o SKU do produto',
            'quantidade.required'        => 'Informe a quantidade',
        ];
    }
}
