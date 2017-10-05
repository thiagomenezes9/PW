<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome','dtnasc','email','sexo','cpf','rg'];



    protected $dates = ['dtnasc'];


    public function enderecos(){
        return $this->hasMany('App\Endereco', 'cliente_id');
    }


}
