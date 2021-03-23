<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteo extends Model
{
    public $incrementing = false;
    protected $primaryKey='idBitacora';
    protected $table='conteo';

    public function relacionConteoBitacora(){
        return $this->hasOne('App\Bitacora', 'idBitacora', 'idBitacora');
    }
}
