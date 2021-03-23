<?php

use Illuminate\Database\Seeder;

class sintomaTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::table('sintoma')->insert([
            'nombre'=>'Natación irregular'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Branquias Pálidas'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Abdomen hinchado'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Oscurecimiento de la piel'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Prominencia en globo(s) ocular(es)'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hígado pálido'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hemorragia visceral'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Líquido mucoso en estomago'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'No consume mucho alimento'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Intensa inflamación del bazo'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Riñon pálido'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hematomas en la piel'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Descamación'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Distrés respiratorio'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Letargia'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Necrosis'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Deformaciones internas'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hemorragia alrededor de la boca'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hemorragia anal'
        ]);

        DB::table('sintoma')->insert([
            'nombre'=>'Hemorragia bajo las aletas'
        ]);
    }
}
