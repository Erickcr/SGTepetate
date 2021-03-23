<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'idPedido';

    public function relacionPedidoProducto(){
        return $this->belongsToMany('App\Producto','productospedido','idPedido','idProducto')->withPivot('cantidad','precio');

    }
}
