<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /////// le decimos a que tabla pertenece este modelo
    protected $primaryKey='idProducto';
    protected $table='producto';
}
