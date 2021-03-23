<?php

use Illuminate\Database\Seeder;

class productosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert([
            'imagen'=>'producto2.jpg',   
            'nombre'=>'Filete de trucha salmonada',
            'descripcion'=>'Delicioso filete de trucha salmonada, 
                            cuenta con montones de vitaminas y omega3.',
            'precioMenudeo'=>'285',
            'descuentoMenudeo'=>'0',
        ]);
        DB::table('producto')->insert([
            'imagen'=>'producto4.jpg',   
            'nombre'=>'Trucha salmonada deshuesada corte mariposa',
            'descripcion'=>'Trucha salmonada presentada al estilo de corte mariposa.',
            'precioMenudeo'=>'185',
            'descuentoMenudeo'=>'0',
        ]);
        DB::table('producto')->insert([
            'imagen'=>'producto3.jpg',   
            'nombre'=>'Trucha salmonada ahumada',
            'descripcion'=>'Deliciosa trucha salmonada ya ahumada.',
            'precioMenudeo'=>'85',
            'descuentoMenudeo'=>'10',
        ]);
        DB::table('producto')->insert([
            'imagen'=>'producto1.jpg',   
            'nombre'=>'Trucha ahumada blanca',
            'descripcion'=>'Deliciosa trucha blanca ya ahumada.',
            'precioMenudeo'=>'75',
            'descuentoMenudeo'=>'5',
        ]);
        DB::table('producto')->insert([
            'imagen'=>'producto5.jpg',   
            'nombre'=>'Trucha entera blanca',
            'descripcion'=>'Deliciosa trucha entera sin salmonar.',
            'precioMenudeo'=>'55',
            'descuentoMenudeo'=>'0',
        ]);
        DB::table('producto')->insert([
            'imagen'=>'producto6.jpg',   
            'nombre'=>'Trucha entera salmonada',
            'descripcion'=>'Deliciosa trucha entera salmonada.',
            'precioMenudeo'=>'55',
            'descuentoMenudeo'=>'0',
        ]);
    }
}
