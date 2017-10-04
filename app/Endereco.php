<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['cliente_id','endereco','cidade_id','cep','bairro','complemento','numero','ponto_ref'];



}
