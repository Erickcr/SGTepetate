<?php

use Illuminate\Database\Seeder;

class unidadmedidaTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidadmedida')->insert([
            'nombre'=>'Unidad',   
            'abreviatura'=>'Pz.',
            'tipo'=>'Entero'        
        ]);
        DB::table('unidadmedida')->insert([
            'nombre'=>'Kilogramo',   
            'abreviatura'=>'Kg.',
            'tipo'=>'Decimal'        
        ]);
        DB::table('unidadmedida')->insert([
            'nombre'=>'Gramo',   
            'abreviatura'=>'g.',
            'tipo'=>'Decimal'        
        ]);
        DB::table('unidadmedida')->insert([
            'nombre'=>'Litro',   
            'abreviatura'=>'L.',
            'tipo'=>'Decimal'        
        ]);
        DB::table('unidadmedida')->insert([
            'nombre'=>'Mililitro',   
            'abreviatura'=>'mL.',
            'tipo'=>'Decimal'        
        ]);
    }
}
