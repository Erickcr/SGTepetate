<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModificacionInventario extends Model
{
    public $incrementing = false;
    protected $table = 'modificacioninventario';
    protected $primaryKey = 'bitacora';
}
