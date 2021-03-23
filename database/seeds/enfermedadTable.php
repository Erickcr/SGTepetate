<?php

use Illuminate\Database\Seeder;

class enfermedadTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enfermedad')->insert([
            'nombre'=>'Necrosis Pancreática Infecciosa',   
            'descripcion'=>'Enfermedad viral altamente contagiosa, que afecta a peces jóvenes, genera 
                            brotes en primera alimentación y alevinaje con mortalidades que van de un 
                            20-30%. Los sobrevivientes son peces con secuelas, comen pero no convierten 
                            y se genera una alta dispersión. Como su nombre lo dice, el órgano más afectado 
                            es el páncreas y, en casos severos, se puede observar pérdida de la estructura 
                            celular e incluso del órgano.',    
            'tratamiento'=> 'Para el control de la NPI en granjas de reproductores, tanto los peces infectados 
                            como su progenie (ovas, alevines y cría) deben ser sacrificados.'
        ]);

        DB::table('enfermedad')->insert([
            'nombre'=>'Flavobacteriosis o síndrome del alevin de la trucha',   
            'descripcion'=>'También conocido como Enfermedad Bacteriana de Aguas Frías es causada por la bacteria 
                            gram-negativa. Causa mortalidad en alevines pequeños, con consecuencias catastróficas 
                            si no es controlada oportunamente y su transmisión es horizontal y vertical. Afecta a 
                            peces de agua dulce, en temperaturas entre 15 y 18°C., en etapas de cultivo de ovas 
                            embrionadas hasta reproductores.',    
            'tratamiento'=> 'Puede tratarse con oxitetraciclina.'
        ]);

        DB::table('enfermedad')->insert([
            'nombre'=>'Saprolegniasis',   
            'descripcion'=>'Oomiceto, morfológicamente parecido a los hongos, aunque comúnmente se incluya dentro 
                            de las enfermedades causadas por hongos no pertenecen al Reino Fungi, clasificándose 
                            actualmente en el Reino Chromista. Ataca a peces en sus primeras etapas de cultivo, 
                            afecta a ovas y peces inmunodeprimidos. Los factores predisponentes son la alta cantidad 
                            de materia orgánica dentro de las unidades de cultivo, las graduaciones, etc. la saprolegniasis 
                            se transmite de forma horizontal.',    
            'tratamiento'=> 'Los tratamientos profilácticos lograron mejorar entre 10 y 20% la sobrevivencia 
                            embrionaria a eclosión en relación al control. Los tratamientos de sal y formalina 
                            condujeron a una mejor respuesta.'
        ]);

        DB::table('enfermedad')->insert([
            'nombre'=>'Enfermedad Bacteriana del Riñon',   
            'descripcion'=>'Es un patógeno intracelular obligado, con importante transmisión, tanto vertical y horizontal 
                            patología de curso crónico sistémica, que afecta en menor medida, a la trucha, los brotes se 
                            presentan durante todo el año en agua dulce.',    
            'tratamiento'=> 'Tratamiento preventivo de sanitización.'
        ]);

        DB::table('enfermedad')->insert([
            'nombre'=>'Enfermedad de la boca roja',   
            'descripcion'=>'La enfermedad de la boca roja o yersiniosis es causada por Yersinia ruckeri, una bacteria que 
                            afecta a principalmente a salmónidos, ocasionando una infección sistémica de curso agudo a 
                            crónico con altas mortalidades y grandes pérdidas económicas. La trucha arcoíris es la especie 
                            más susceptible a este agente bacteriano. La yersiniosis es más contagiosa a temperaturas del 
                            agua de 15-20 °C, siendo de 5 a 10 días el periodo de incubación de la infección. La transmisión 
                            de la enfermedad es principalmente de forma horizontal a través del agua por las deyecciones de 
                            peces enfermos o portadores.',    
            'tratamiento'=> 'Oxitetraciclina, para aplicar en el alimento, para el control de enfermedades 
                            infecciosas causadas por bacterias Gram.'
        ]);
    }
}
