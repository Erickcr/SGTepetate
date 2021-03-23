<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table='bitacora';
    protected $primaryKey='idBitacora';

    public function rel_usuario(){
        return $this->belongsTo('App\Usuario','usuario','idUsuario');
    }

    public function rel_modificacionInventario()
    {
        return $this->hasOne('App\modificacionInventario');
    }

    public function relacionBitacoraEstanque(){
        return $this->belongsToMany('App\Estanque','registroestanque','bitacora','estanque');
    }

    public function relacionBitacoraConteo(){
        return $this->hasOne('App\Conteo', 'idBitacora', 'idBitacora');
    }

    public function relacionBitacoraActividad(){
        return $this->belongsToMany('App\Actividad','registroactividad','idBitacora','idActividad');
    }

    public function relacionBitacoraUsuario(){
        return $this->hasOne('App\Usuario','idUsuario','usuario');
    }

    

}
