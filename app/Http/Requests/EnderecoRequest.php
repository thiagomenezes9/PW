<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'endereco' => 'required|max:255',

            'numero' => 'required|integer',
            'bairro' => 'required',
            'cep' => 'required',
            'cidades'=>'required'



        ];
    }

    public function messages(){
        return [


            'endereco.required' => 'Endereço e obrigatorio',
            'endereco.max' =>'Tamanho maximo 255 caracters',

            'numero.required' => 'Numero e obrigatorio',
            'bairro.required' => 'Bairro e obrigatorio',
            'cep.required' => 'CEP e obrigatorio',
            'numero.integer' => 'Numero deve ser inteiro',
            'cidades.required' => 'cidade seleção obrigatorio'


        ];
    }
}
