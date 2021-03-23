<?php

use Illuminate\Database\Seeder;

class inventarioTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventario')->insert([
            'nombre'=>'Comida 1',   
            'cantidad'=>10,
            'descripcion'=>'Descripción de la comida 1',
            'categoria'=>1,
            'unidadmedida'=>2        
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Comida 2',   
            'cantidad'=>600,
            'descripcion'=>'Descripción de la comida 2',
            'categoria'=>1,
            'unidadmedida'=>3        
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Comida 3',   
            'cantidad'=>100,
            'descripcion'=>'Descripción de la comida 3',
            'categoria'=>1,
            'unidadmedida'=>3
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Medicina 1',   
            'cantidad'=>50,
            'descripcion'=>'Descripción de la medicina 1',
            'categoria'=>2,
            'unidadmedida'=>4        
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Medicina 2',   
            'cantidad'=>600,
            'descripcion'=>'Descripción de la medicina 2',
            'categoria'=>2,
            'unidadmedida'=>5        
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Trucha corte mariposa',   
            'cantidad'=>50,
            'descripcion'=>'Descripción de trucha corte mariposa',
            'categoria'=>3,
            'unidadmedida'=>1        
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Trucha ahumada blanca',   
            'cantidad'=>16,
            'descripcion'=>'Descripción de trucha ahumada blanca',
            'categoria'=>3,
            'unidadmedida'=>2     
        ]);
        DB::table('inventario')->insert([
            'nombre'=>'Trucha entera blanca',   
            'cantidad'=>20,
            'descripcion'=>'Descripción de trucha entera blanca',
            'categoria'=>3,
            'unidadmedida'=>1        
        ]);
    }
}
