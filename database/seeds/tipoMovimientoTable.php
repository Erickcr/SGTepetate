<?php

use Illuminate\Database\Seeder;

class tipoMovimientoTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Egreso',   
            'nombre'=>'Compra de alimento',
            'descripcion'=>'Compra o adquisicion de alimentos'        
        ]);
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Egreso',   
            'nombre'=>'Pago de nómina',
            'descripcion'=>'Pago de sueldos y salarios al personal'        
        ]);
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Egreso',   
            'nombre'=>'Compra de medicinas',
            'descripcion'=>'Compra o adquisicion de medicamentos'        
        ]);
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Egreso',   
            'nombre'=>'Pago de servicios',
            'descripcion'=>'Pago de distintos servicios'        
        ]);
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Ingreso',   
            'nombre'=>'Venta de trucha',
            'descripcion'=>'Venta de truchas jamaiquinas'        
        ]);
        DB::table('tipomovimiento')->insert([
            'egresoIngreso'=>'Ingreso',   
            'nombre'=>'Otros',
            'descripcion'=>'Otros tipos de ingresos'        
        ]);
    }
}
