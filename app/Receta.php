<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $primaryKey='idReceta';
    public function rel_producto()
    {
        return $this->hasOne('App\Producto','idProducto','producto');
    }
    protected $table = 'receta';
}
