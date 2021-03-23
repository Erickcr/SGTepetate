<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enfermedad extends Model
{
    protected $primaryKey='idEnfermedad';
    protected $table='enfermedad';

    public function relacionSintomaEnfermedad(){
        return $this->belongsToMany('App\Sintoma','sintomasenfermedad','idEnfermedad','idSintoma');
    }

   
}
