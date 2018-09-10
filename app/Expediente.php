<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';

    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }
}
