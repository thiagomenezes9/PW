<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['cliente_id','endereco','cidade_id','cep','bairro','complemento','numero','ponto_ref'];



    public function clietes(){
        return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function cidades(){
        return $this->belongsTo('App\Cidade','cidade_id');
    }

}
