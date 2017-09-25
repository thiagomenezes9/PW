<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaisRequest extends FormRequest
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
            'nome' => 'required|unique:pais|max:255',
            'sigla' => 'required',


        ];
    }

    public function messages(){
        return [
            'nome.required' => 'É necessário digitar um nome',
            'nome.unique' => 'Nome já existe',

            'sigla.required' => 'É necessário digitar uma sigla',

        ];
    }
}
