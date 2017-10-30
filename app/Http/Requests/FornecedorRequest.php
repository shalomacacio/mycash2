<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
     'nome'             =>  'required|min:2|max:255|unique:fornecedores',
     'tipo_fornecedor'  =>  'required',
     'cpf_cnpj'         =>  'numeric|digits_between:11,14|nullable',         
     'contato'          =>  'numeric|nullable'         
     ];
     
    }
}
