<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function proposta(){
        return $this->hasMany(Proposta::class);
    }
}
