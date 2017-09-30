<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $fillable = ['nome','sigla','bandeira'];




    public function estados()
    {
        return $this->hasMany('App\Estado','estados_id');
    }


}


