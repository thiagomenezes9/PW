<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome','sigla','idEstado'];

    public function estado(){
        return $this->belongsTo('app\Estado');
    }
}
