<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'idInventario';
    public function rel_unidad()
    {
        return $this->belongsTo('App\Unidadmedida','unidadMedida' ,'idUnidadMedida');
    }
    public function rel_categoria()
    {
         return $this->belongsTo('App\Categoria','categoria','idCategoria');
    }

}
