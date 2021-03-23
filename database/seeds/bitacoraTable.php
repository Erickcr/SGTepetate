<?php

use Illuminate\Database\Seeder;

class bitacoraTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SEEDERS DE CONTEO Y MUERTES
        DB::table('bitacora')->insert([
            'fecha'=>'2020-02-16',   
            'usuario'=>'1',
            'vigente'=>'1',
            'descripcion'=>'Se hizo conteo de peces'     
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-04-17',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-05-18',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-03-19',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-04-20',   
            'usuario'=>'1',
            'vigente'=>'1',
            'descripcion'=>'Se hizo conteo de peces'         
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-05-21',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-03-22',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-04-16',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-05-16',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        DB::table('bitacora')->insert([
            'fecha'=>'2020-03-20',   
            'usuario'=>'1',
            'vigente'=>'1'        
        ]);

        //SEDEERS DE ENFERMEDADES
        DB::table('bitacora')->insert([
            'fecha'=>'2020-03-21',   
            'usuario'=>'1',
            'vigente'=>'1',
            'enfermedad'=>'1'       
        ]);
        DB::table('bitacora')->insert([
            'fecha'=>'2020-03-24',   
            'usuario'=>'1',
            'vigente'=>'1',
            'enfermedad'=>'1'       
        ]);
        DB::table('bitacora')->insert([
            'fecha'=>'2020-04-01',   
            'usuario'=>'1',
            'vigente'=>'1',
            'enfermedad'=>'2'       
        ]);
        DB::table('bitacora')->insert([
            'fecha'=>'2020-04-10',   
            'usuario'=>'1',
            'vigente'=>'1',
            'enfermedad'=>'2'       
        ]);
        DB::table('bitacora')->insert([
            'fecha'=>'2020-05-20',   
            'usuario'=>'1',
            'vigente'=>'1',
            'enfermedad'=>'3'       
        ]);
    }
}
