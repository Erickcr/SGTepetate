<?php

use Illuminate\Database\Seeder;

class estanqueTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estanque')->insert([
            'nombre'=>'Ovas 1',   
            'descripcion'=>'Crías de truchas',
            'volumen'=>'60'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Ovas 2',   
            'descripcion'=>'Crías de truchas 2 semanas',
            'volumen'=>'70'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Aluvinos 1',   
            'descripcion'=>'Truchas inmaduras',
            'volumen'=>'70'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Aluvinos 2',  
            'descripcion'=>'Truchas inmaduras 2',
            'volumen'=>'180'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Engorda 1',   
            'descripcion'=>'Truchas medianas en engorda',
            'volumen'=>'350'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Engorda 2',   
            'descripcion'=>'Truchas medianas en engorda 2 semanas',
            'volumen'=>'500'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Engorda 3',   
            'descripcion'=>'Truchas medianas en engorda 4 semanas',
            'volumen'=>'400'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Engorda 4',   
            'descripcion'=>'Truchas medianas en engorda 6 semanas',
            'volumen'=>'400'        
        ]);

        DB::table('estanque')->insert([
            'nombre'=>'Trucha lista',   
            'descripcion'=>'Truchas listas para venta',
            'volumen'=>'500'        
        ]);
    }
}
