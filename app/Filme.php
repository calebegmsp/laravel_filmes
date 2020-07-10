<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function atores()
    {
        return $this->belongsToMany('App\Ator', 'filme_ators', 'filme_id', 'ator_id');
    }

}
