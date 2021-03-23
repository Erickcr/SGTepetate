<?php

use Illuminate\Database\Seeder;

class pedidoTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedido')->insert([
            'telefono'=>'4566431559',   
            'direccion'=>'Manuel Doblado 159 Valle de Santiago',
            'nombre'=>'Agustín Aguilar',
            'correo'=>'agusAguilar@gmail.com',
            'descripcion'=>'',
            'total'=>'200',
            'fecha'=>'2020-04-16'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4566431559',   
            'direccion'=>'Manuel Doblado 159 Valle de Santiago',
            'nombre'=>'Carolina Solorzano',
            'correo'=>'agusAguilar@gmail.com',
            'descripcion'=>'Hola',
            'total'=>'200',
            'fecha'=>'2020-03-13'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021993',   
            'direccion'=>'Morelia, Mich',
            'nombre'=>'Berenice Hernández',
            'correo'=>'blibros@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-02-11'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021993',   
            'direccion'=>'Morelia, Mich',
            'nombre'=>'Berenice Hernández',
            'correo'=>'blibros@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-02-11'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021991',   
            'direccion'=>'Morelia, Mich',
            'nombre'=>'Oscar López López',
            'correo'=>'creisiass@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-02-18'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021990',   
            'direccion'=>'Morelia, Mich',
            'nombre'=>'Leonardo Huerta Rendón',
            'correo'=>'leocandy@gmail.com',
            'total'=>'200',
            'fecha'=>'2019-02-11'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021890',   
            'direccion'=>'Patzcuaro, Mich',
            'nombre'=>'Adrián Viledruid Ontiveros',
            'correo'=>'cj_maxfort@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-01'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021890',   
            'direccion'=>'Patzcuaro, Mich',
            'nombre'=>'Adrián Viledruid Ontiveros',
            'correo'=>'cj_maxfort@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-01'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432021890',   
            'direccion'=>'Patzcuaro, Mich',
            'nombre'=>'Kovon Yi',
            'correo'=>'monochino@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-01'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4433021890',   
            'direccion'=>'El realito, Calle Lima 33',
            'nombre'=>'Adolfo Rendón',
            'correo'=>'mamadolfo@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-03'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4432218900',   
            'direccion'=>'Zamora, Michoacán',
            'nombre'=>'Jesús García Mendiola',
            'correo'=>'YisusElGrande@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-03'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4433224055',   
            'direccion'=>'la madero',
            'nombre'=>'Doña Chela',
            'correo'=>'micorreo@gmail.com',
            'total'=>'200',
            'fecha'=>'2020-01-01'     
        ]);
        DB::table('pedido')->insert([
            'telefono'=>'4566436934',   
            'direccion'=>'Salamanca, Gto',
            'nombre'=>'Jacob Cruz',
            'correo'=>'elcrucito@gmail.com',
            'total'=>'200',
            'fecha'=>'2018-01-01'     
        ]);
    }
}