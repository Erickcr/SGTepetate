<?php

use Illuminate\Database\Seeder;

class registroestanqueTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registroestanque')->insert([
            'bitacora'=>'1',   
            'estanque'=>'9'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'2',   
            'estanque'=>'8'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'3',   
            'estanque'=>'7'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'4',   
            'estanque'=>'6'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'5',   
            'estanque'=>'5'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'6',   
            'estanque'=>'4'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'7',   
            'estanque'=>'3'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'8',   
            'estanque'=>'2'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'9',   
            'estanque'=>'1'    
        ]);

        DB::table('registroestanque')->insert([
            'bitacora'=>'10',   
            'estanque'=>'9'    
        ]);
    }
}
