<?php

use Illuminate\Database\Seeder;

class ofertasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ofertas')->insert([
            'imagen'=>'Ofertas1.jpg',   
            'titulo'=>'¡10% DE DESCUENTO EN TODOS LOS PRODUCTOS!',
            'texto'=>'Por temporada navideña -10% en todos los productos',
            'oferta'=>'1'
        ]);

        DB::table('ofertas')->insert([
            'imagen'=>'Ofertas2.jpg',
            'titulo'=>'NUEVA PÁGINA WEB YA DISPONIBLE',   
            'texto'=>'Visita nuestra granja para un descuento especial',
            'boton'=>'Visítala Ya!',
            'link'=>'/sgtepetate',
            'oferta'=>'0'     
        ]);

        DB::table('ofertas')->insert([
            'imagen'=>'Ofertas3.jpg',
            'titulo'=>'¡20% DE DESCUENTO EN TRUCHA ENTERA!',
            'texto'=>'20% de descuento en trucha entera, vaya a la tienda y cómprela lo antes posibles',
            'oferta'=>'1'    
        ]);

        DB::table('ofertas')->insert([
            'imagen'=>'Ofertas4.jpg',
            'titulo'=>'NUEVA PÁGINA DE FACEBOOK',
            'texto'=>'Nuestra página de facebook ya está disponible',
            'boton'=>'Ver página',
            'link'=>'/sgtepetate',
            'oferta'=>'0'
        ]);
    }
}