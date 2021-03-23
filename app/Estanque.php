<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estanque extends Model
{
    protected $primaryKey='idEstanque';
    protected $table='estanque';

    public function relacionEstanqueBitacora(){
        return $this->belongsToMany('App\Bitacora','registroestanque','estanque','bitacora');
    }
}
