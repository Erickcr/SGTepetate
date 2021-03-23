<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registroestanque extends Model
{
    public $incrementing = false;
    protected $table = 'registroestanque';
    protected $primaryKey = ['bitacora','estanque'];
}
