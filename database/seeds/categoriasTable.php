<?php

use Illuminate\Database\Seeder;

class categoriasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'foto'=>'Alimento1.jpg',   
            'nombre'=>'Alimento',
            'descripcion'=>'Alimento para truchas'        
        ]);
        DB::table('categoria')->insert([
            'foto'=>'Medicina1.jpg',   
            'nombre'=>'Medicina',
            'descripcion'=>'Medicina para truchas'        
        ]);
        DB::table('categoria')->insert([
            'foto'=>'Producto1.jpg',   
            'nombre'=>'Productos',
            'descripcion'=>'Productos disponibles'        
        ]);
    }
}
