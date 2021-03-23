<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintomasenfermedad extends Model
{
    public $incrementing = false;
    protected $table='sintomasenfermedad';
    protected $primaryKey=['idEnfermedad','idSintoma'];
}
