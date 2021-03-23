<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidadmedida extends Model
{
    protected $table = 'unidadmedida';
    protected $primaryKey = 'idUnidadMedida';
    public function rel_unidad_inventario()
    {
        return $this->hasMany('App\Inventario','unidadmedida','idUnidadMedida');
    }
}
