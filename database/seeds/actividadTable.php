<?php

use Illuminate\Database\Seeder;

class actividadTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actividad')->insert([
            'nombre'=>'Ingreso de inventario' 
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Egreso de inventario'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Conteo'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Mov Financiero - Ingreso'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Mov Financiero - Egreso'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Alimentar truchas'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Registro trucha enferma'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Limpiar estanque'        
        ]);
        DB::table('actividad')->insert([
            'nombre'=>'Barrer local'        
        ]);
    }
}
