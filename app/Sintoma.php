<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $primaryKey='idSintoma';
    protected $table='sintoma';

    public function relacionEnfermedadSintoma(){
        return $this->hasMany('App\Enfermedad','sintomasenfermedad','idSintoma','idEnfermedad');
    }
}
