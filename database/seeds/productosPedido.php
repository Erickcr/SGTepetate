<?php

use Illuminate\Database\Seeder;

class productosPedido extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productospedido')->insert([
            'idPedido'=>'2',
            'precio'=>'70',
            'cantidad'=>'5',
            'descuento'=>'10',
            'nombre'=>'Trucha Salmonada'
        ]);
        
        DB::table('productospedido')->insert([
            'idPedido'=>'2',
            'precio'=>'700',
            'cantidad'=>'3',
            'descuento'=>'0',
            'nombre'=>'Trucha Salmonada Entera'   
        ]);

        
        DB::table('productospedido')->insert([
            'idPedido'=>'4',
            'precio'=>'120',
            'cantidad'=>'10',
            'descuento'=>'25',
            'nombre'=>'Trucha Sin espinas'   
        ]);
    }
}
