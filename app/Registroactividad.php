<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registroactividad extends Model
{
    
    public $incrementing = false;
    protected $table = 'registroactividad';
    protected $primaryKey = ['idBitacora','idActividad'];

    public function relacionRegistroActividad(){
        return $this->belongsToMany('App\Actividad','idActividad','actividad');
    }
}
