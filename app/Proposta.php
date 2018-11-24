<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{   
    protected $fillable = [
        'status', 'preco', 'descricao', 'email', 'pedido_id'
    ];
    
    //protected $table = 'pedidos';

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
