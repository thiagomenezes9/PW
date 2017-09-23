<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nome','sigla','idPais'];

    public function pais(){
        return $this->belongsTo('App\Pais');
    }

}
