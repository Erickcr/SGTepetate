<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovFinanciero extends Model
{
    //
    protected $primaryKey='idMovFinanciero';
    protected $table='movfinanciero';
    
    public function rel_tipomov()
    {
        return $this->hasOne('App\Tipomovimiento','idTipoMovimiento','tipoMovimiento');
    }

    public function rel_bitacora(){
        return $this->belongsTo('App\Bitacora','idMovFinanciero','movFinanciero');
    }

}
