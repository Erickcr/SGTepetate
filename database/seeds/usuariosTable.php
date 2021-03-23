<?php

use Illuminate\Database\Seeder;

class usuariosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'nombre'=>'Bruno Diaz',
            'tipo'=>'Tecnico',
            'calle'=>'Juan Escutia',
            'numCasa'=>13,
            'colonia'=>'Lomas del Tecnológico',
            'ciudad'=>'Morelia',
            'estatus'=>1,
            'telefono'=>'1234',
            'contraseña'=>'bruno123',
            'sueldo'=>10000,
            'fechaNac'=>'2017-04-04',
            'fechaContratacion'=>'2020-05-03',
            'email'=>'bruno@hotmail.com',
            'foto'=>'Usuario1.jpeg'
        ]);

        DB::table('usuario')->insert([
            'nombre'=>'Kim Min Ji',
            'tipo'=>'Administrador',
            'calle'=>'Igancio Moctezuma',
            'numCasa'=>159,
            'colonia'=>'Agua Clara',
            'ciudad'=>'Morelia',
            'estatus'=>1,
            'telefono'=>'4433998915',
            'contraseña'=>'password',
            'sueldo'=>50000,
            'fechaNac'=>'2019-02-02',
            'fechaContratacion'=>'2020-05-03',
            'email'=>'test@hotmail.com',
            'foto'=>'dreamJIU.jpeg'
        ]);
    }
}
