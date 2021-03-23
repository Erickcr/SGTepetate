<?php

use Illuminate\Database\Seeder;

class recetasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('receta')->insert([
            'imagen'=>'receta1.jpg',
            'nombre'=>'Filete de trucha a la plancha',
            'descripcion'=>'Delicioso y rápido de preparar.',
            'ingredientes'=>'<li>Filete de trucha</li> <li>Aceite de oliva</li>  <li>ajo</li> <li>hierbas finas. </li>',
            'pasos'=>'<li>Hacer una mezcla del aceite de oliva con el ajo y las hierbas finas, incorporar la mezcla al filete y dejarlo reposar 15 minutos. </li> <li>Agregar sal al filete y colocarlo en una plancha previamente caliente.</li> <li>Acompañar con verduras al vapor, arroz o ensalada de su preferencia.</li>',
            'videoURL'=>'https://www.youtube.com/watch?v=2zAJ5p4U4FQ',
            'producto'=>'1'
        ]);
        DB::table('receta')->insert([
            'nombre'=>'Trucha al Aguachile.',
            'imagen'=>'receta2.jpg',
            'descripcion'=>'Delicioso y rápido de preparar.',
            'ingredientes'=>'<li>2 Filetes de trucha</li> <li>1 cebolla</li> <li>1 pepino</li> <li>1 chile habanero</li> <li>5 limones</li> <li>Cilantro</li> <li>1 diente de ajo</li> <li>Pimienta</li> <li>Sal al gusto</li>',
            'pasos'=>'<li>Parta el filete en tiras y agregue el jugo de 5 limones. Reserve por 20 minutos. </li> <li>Corte la cebolla y el pepino en Juliana.  Licúe el cilantro con el chile y ajo, vierta las tiras transcurridos los 20 minutos, agregue la cebolla y el pepino.</li>',
            'videoURL'=>'https://www.youtube.com/watch?v=L0YPhtAdq4Q',
            'producto'=>'2'
        ]);
        DB::table('receta')->insert([
            'nombre'=>'Trucha con salsa de champiñones',
            'imagen'=>'receta3.jpg',
            'descripcion'=>'Delicioso y rápido de preparar! Trucha en su salsa con champiñones',
            'ingredientes'=>'<li>500 g de filetes de trucha</li> <li>5 g de sal</li>
            <li>0.5 g de pimienta negra molida</li>
            PARA LA SALSA
            <li>25 ml de aceite de oliva</li>
            <li>25 ml de aceite vegetal</li>
            <li>25 g de cebolla blanca picada</li>
            <li>150 g de champiñones en cuartos</li>
            <li>125 ml de crema ácida</li>
            <li>2 g de sal</li>
            <li>5 ml de jugo de limón</li>
            <li>3 g de perejil fresco picado</li>',
            'pasos'=>'<li>Salpimentar los filetes y freírlos en una sartén con aceite de oliva (previamente calentado).</li>
            <li>Para la salsa de champiñones : calienta el aceite en una cacerola y acitrona la cebolla; incorpora los champiñones y fríe.</li>
            <li>Añade la crema ácida, la sal y el jugo de limón, lleva a ebullición; incorpora el perejil y rectifica la sazón.</li>
            <li>Sirve los filetes de trucha bañados con la salsa de champiñones.</li>',
            'videoURL'=>'https://www.youtube.com/watch?v=AKoqc6vPV0E',
            'producto'=>'1'
        ]);
    }
}
