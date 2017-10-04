<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|unique:clientes|max:255',

            'email' => 'required|email',
            'cpf' => 'required',


        ];
    }

    public function messages(){
        return [
            'nome.required' => 'É necessário digitar um nome',
            'nome.unique' => 'Cliente já existe',
            'email.email' => 'Formato de email inválido',

            'email.required' => 'É necessário digitar um email',
            'cpf.required' => 'É necessário digitar um CPF',


        ];
    }

}
