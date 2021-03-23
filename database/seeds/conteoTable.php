<?php

use Illuminate\Database\Seeder;

class conteoTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conteo')->insert([
            'idBitacora'=>1,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>200,
            'longitud'=>45,
            'peso'=>500,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Enfermedad' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>2,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>90,
            'longitud'=>27,
            'peso'=>500,
            'pecesMuertos'=>30,
            'causaMuerte'=>'Desconocida'    
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>3,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>80,
            'longitud'=>26,
            'peso'=>500,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Desconocida' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>4,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>70,
            'longitud'=>25,
            'peso'=>500,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Ataque por el cardumen' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>5,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>60,
            'longitud'=>24,
            'peso'=>500,
            'pecesMuertos'=>10,
            'causaMuerte'=>'Ataque por el cardumen' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>6,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>50,
            'longitud'=>23,
            'peso'=>500,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Desconocida' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>7,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>40,
            'longitud'=>22,
            'peso'=>500,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Desconocida'  
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>8,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>30,
            'longitud'=>21,
            'peso'=>500,
            'pecesMuertos'=>1,
            'causaMuerte'=>'Enfermedad' 
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>9,   
            'observaciones'=>'Revisión normal',
            'numeroDePeces'=>20,
            'longitud'=>20,
            'peso'=>50,
            'pecesMuertos'=>5,
            'causaMuerte'=>'Enfermedad'    
        ]);

        DB::table('conteo')->insert([
            'idBitacora'=>10,   
            'observaciones'=>'Revisión mal',
            'numeroDePeces'=>200,
            'longitud'=>45,
            'peso'=>500,
            'pecesMuertos'=>15,
            'causaMuerte'=>'Desconocida' 
        ]);
    }
}
