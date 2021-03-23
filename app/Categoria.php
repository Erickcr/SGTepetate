<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'idCategoria';
    public function rel_inventario()
    {
        return $this->hasMany('App\Inventario','categoria','idCategoria');
    }
}
