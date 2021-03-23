<?php

use Illuminate\Database\Seeder;

class noticiasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert([
            'imagen'=>'Noticias1.jpg',
            'titulo'=>'Granja abierta para visitantes!',
            'texto'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non aliquet est. Curabitur sit amet varius nulla. Nulla facilisi. Phasellus placerat a mi sed interdum. Mauris diam lorem, ultrices nec est non, scelerisque eleifend velit. Pellentesque maximus non nisl eu rutrum. In hac habitasse platea dictumst. Mauris aliquet urna in nisi auctor, eget scelerisque dui maximus. Praesent tristique facilisis ullamcorper. Praesent nec maximus diam. Ut quis erat accumsan, pretium arcu eget, luctus purus. Curabitur ac justo aliquam, consectetur odio sit amet, consequat nisl. Morbi a arcu ut lacus rutrum tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

            <p>Morbi libero orci, iaculis eu turpis eu, aliquam imperdiet ante. Etiam lacinia lorem ac risus interdum condimentum. Nunc et nibh sit amet sem ullamcorper gravida et id mi. Nam eleifend molestie sodales. Duis sit amet felis interdum, efficitur mauris sed, fermentum mi. Phasellus eleifend ullamcorper nunc eu consequat. In at laoreet arcu, eu viverra odio. Nulla tristique sapien sit amet quam dictum, aliquam dapibus neque mollis. Maecenas eu ipsum in turpis sagittis pharetra fringilla at nibh.</p>
            
            <p>Nunc magna felis, dapibus sed sodales et, aliquet et nisi. Mauris ac quam scelerisque, semper orci eget, fringilla massa. Donec id porttitor urna. Nunc sit amet facilisis ipsum. Nam sed sollicitudin quam. In hac habitasse platea dictumst. Proin volutpat sollicitudin nulla, at vestibulum nulla. Duis sit amet magna id odio congue auctor id eget orci. Curabitur eget posuere ipsum. Mauris sed nibh lacus. Phasellus porttitor lacus in placerat efficitur. Sed eu tellus finibus, sollicitudin tortor ut, facilisis leo. Nulla iaculis suscipit dictum. Ut sagittis velit enim, ac molestie augue luctus sit amet. Nulla efficitur rhoncus justo, eu lobortis metus convallis porttitor.</p>',
            'boton'=>'Más información',
            'link'=>'127.0.0.1:8000/',
            'fecha'=>'2020-05-13' 
        ]);

        DB::table('noticias')->insert([
            'imagen'=>'Noticias2.jpg',
            'titulo'=>'Nueva página en Facebook, entra ya!',
            'texto'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus in eros venenatis, ac fermentum magna volutpat. Praesent eu diam id <strong>est </strong>pretium euismod. Duis ac pharetra magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam ut leo sit amet nibh ultrices hendrerit. Sed luctus blandit euismod. Nam in dictum nulla. Ut consectetur rhoncus ligula, ac molestie enim feugiat et. Sed pulvinar purus gravida nisi pharetra, eget euismod nulla mollis. Vivamus luctus malesuada nibh. Etiam maximus eleifend dolor, eget sodales est ullamcorper sit amet. Duis tempus ligula sed mi interdum, ac feugiat orci imperdiet. Mauris non nulla convallis, <strong>pharetra </strong>mi nec, semper lacus. Praesent eget volutpat est.</p>

            <p>Nam id arcu et sem scelerisque pretium. Vestibulum in ipsum tempor, finibus nisi at, mattis augue. Cras mollis tortor in bibendum cursus. Quisque interdum nulla id leo porttitor, quis euismod dolor consectetur. Nam enim libero, molestie in hendrerit sed, pulvinar quis nibh. Nam sed risus ipsum. Quisque ut molestie lorem. Nullam eu felis massa. Duis diam velit, convallis vel tincidunt faucibus, sodales vel ligula.</p>
            
            <p>Integer quis quam ligula. Quisque sed vulputate nunc. Praesent eget massa semper, feugiat dui sed, iaculis tellus. Nam cursus ligula a scelerisque imperdiet. Sed sollicitudin tincidunt accumsan. Suspendisse molestie condimentum arcu eget semper. Maecenas consectetur tristique volutpat. Fusce volutpat tortor ut finibus pulvinar. Nam iaculis id ex sed mattis. Nunc ac sapien ut ligula mollis tristique. Nulla ut lacus vel neque bibendum sollicitudin. Praesent sit amet nulla feugiat, laoreet mauris in, auctor metus. <strong>Suspendisse </strong>potenti. Etiam id laoreet augue. Mauris sagittis erat tincidunt justo viverra, vel rhoncus augue tempor.</p>
            
            <p>Sed risus tortor, tincidunt vel vehicula sed, lobortis nec diam. Fusce dictum congue feugiat. In mollis cursus dignissim. Phasellus vestibulum pharetra lorem. Fusce fermentum, erat vel dignissim laoreet, libero dolor facilisis dolor, in ultrices felis dui ac nisl. Pellentesque id venenatis velit. Cras sit amet ultricies ante, et <strong>fermentum </strong>lorem. Integer nec ex ut tortor tempus varius quis a augue. Cras cursus ullamcorper neque. Proin consequat iaculis vestibulum. Donec nec lectus magna. Etiam sodales dolor a pretium fermentum. Nunc sodales ut justo vitae malesuada. Aenean varius mi vitae lorem efficitur, id lacinia metus placerat.</p>
            
            <p>In et ligula id arcu pulvinar tristique eget sit amet ex. Vivamus quis dui nec ipsum porta pretium vitae et dui. In hac habitasse platea dictumst. Fusce venenatis quam quis tortor pharetra ullamcorper. Phasellus sed tristique quam. Sed cursus libero vitae pulvinar finibus. Vivamus tempor facilisis metus sit amet placerat. Morbi sit amet lobortis turpis, in efficitur quam. Aliquam orci metus, mollis vel orci quis, volutpat pretium ex. Vestibulum faucibus lacus ut malesuada consequat. Curabitur dignissim neque dui, eget facilisis orci viverra vitae. Fusce orci eros, tincidunt sodales facilisis tempor, euismod ut ligula.</p>',
            'boton'=>'Ver Facebook',
            'link'=>'https://www.facebook.com/Granja-de-Trucha-Tepetates-1125220357665723/',
            'fecha'=>'2020-05-20'       
        ]);

        DB::table('noticias')->insert([
            'imagen'=>'Noticias4.jpg',   
            'titulo'=>'Nueva página web ya disponible!',
            'texto'=>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ex velit, accumsan molestie commodo at, maximus a enim. Vestibulum id sodales lectus. Vivamus metus massa, semper quis dictum vel, elementum at tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque ut ex fringilla, vulputate ipsum a, faucibus nisl. Ut lacinia quam turpis, ac pharetra urna auctor eget. Aenean facilisis suscipit ullamcorper. Nullam vestibulum dolor luctus eros scelerisque, a malesuada augue dictum. Sed nec ipsum et nunc molestie ultrices. Nam suscipit, lorem ut mattis porttitor, massa arcu porta tellus, non dignissim lorem enim non diam. Proin augue nisl, tempor eget pulvinar vitae, viverra convallis lacus. Nam in ultricies lorem, ut fermentum purus. Morbi varius, erat eget facilisis mollis, dui quam scelerisque quam, et commodo odio magna a tellus. Cras posuere tortor quis risus viverra, ut pellentesque nibh molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor enim malesuada quam volutpat, vel placerat odio commodo.</p>

            <p>Nunc quis rhoncus mi. Donec ipsum lacus, venenatis id justo vestibulum, vestibulum ultricies ex. Vivamus eget tristique nunc. Nullam est lectus, semper sit amet sollicitudin eu, tempor a turpis. Praesent iaculis mi non diam aliquam, sit amet posuere risus fringilla. Ut dapibus nunc at massa imperdiet, nec porttitor elit vehicula. Nullam tempor, nibh at efficitur ullamcorper, libero libero porta nisl, quis posuere ipsum est malesuada mauris. Duis sit amet lacus interdum, lobortis dolor eget, pharetra velit. Ut vestibulum lectus id lobortis viverra. Suspendisse pretium varius est, sed sodales velit dapibus ut. Nam efficitur purus eros, ac scelerisque purus posuere et. Phasellus eget laoreet nibh, ac tempor mauris. Etiam in laoreet mauris, at malesuada nibh. In hac habitasse platea dictumst. Vivamus massa libero, euismod ac orci quis, suscipit vestibulum sapien. Etiam fringilla neque lacus, sed cursus tortor vulputate et.</p>
            
            <p>In nec pulvinar libero. Vivamus eget fermentum ipsum. Etiam blandit arcu id risus commodo, ac commodo metus interdum. Curabitur eu lectus eget ex eleifend ornare mattis eu lacus. Donec urna arcu, sodales vitae nisl nec, interdum molestie leo. Morbi lobortis mauris sed dui mollis, sodales scelerisque massa sagittis. Pellentesque congue lorem sed orci egestas, eget rhoncus justo pretium. Sed dictum volutpat libero et egestas. Maecenas ex purus, rhoncus finibus mi et, rhoncus sollicitudin orci. Quisque tincidunt sollicitudin sapien, et dignissim enim mattis at. Suspendisse eget ante fermentum nunc pretium molestie. Curabitur finibus turpis tortor, a luctus ex dapibus vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed libero lacus, auctor eget ante quis, ornare tristique lorem. In dignissim diam at orci molestie, sit amet ultrices turpis molestie.</p>
            
            <p><img alt="" src="https://www.cultura10.com/wp-content/uploads/2015/06/estanque.jpg" style="float:left; height:145px; margin:10px; width:300px" />Nam suscipit orci ut rhoncus fermentum. Sed gravida lectus a justo consectetur vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras nec nisi at ipsum rhoncus porttitor. Proin fermentum arcu sit amet fringilla volutpat. Vivamus lobortis porta turpis et elementum. Ut a lorem blandit, elementum velit at, accumsan lectus. Aliquam fringilla ac leo vitae iaculis. Suspendisse potenti. Suspendisse sed porta orci. Nunc nec massa in sapien interdum finibus ac et nisi. Nullam porttitor laoreet lacinia. Pellentesque euismod non velit consequat gravida.</p>
            
            <p>Duis dictum cursus velit, ut sagittis nulla tincidunt eu. Praesent molestie porttitor luctus. Maecenas ac nunc vestibulum, volutpat nisi eget, lobortis lacus. In nisl elit, semper eu elit quis, rhoncus pulvinar dui. Nam tellus felis, viverra vitae augue non, interdum finibus lacus. Nunc sit amet aliquet quam. Donec cursus at elit ut elementum. Sed ultricies arcu arcu, ut auctor magna varius ut. <s>Etiam sodales maximus libero</s>, <em>vel auctor nibh feugiat et</em>. Fusce ut purus ut nulla accumsan condimentum. Integer ultrices rhoncus elit, dignissim placerat sapien dictum non. Duis mollis, ipsum non dictum interdum, erat felis porta justo, quis ultrices lorem ex in ex. Duis dictum ipsum et scelerisque tristique. Nulla ut neque eget lorem suscipit gravida et ut ante. Vivamus dignissim nunc eget augue dapibus, nec porttitor neque ornare.</p>
            
            <p>Cras vel nisi quis massa fermentum imperdiet in quis dolor. Quisque pretium gravida arcu sed feugiat. Nam blandit mattis facilisis. Praesent purus elit, suscipit ac tristique at, rhoncus sit amet lacus. Nulla nec venenatis felis. <strong>Donec auctor pulvinar dolor</strong>, sed varius nibh. Vestibulum vulputate ex metus, tempus aliquet metus suscipit eget. Suspendisse quam leo, fringilla quis ligula et, semper accumsan ligula. Etiam luctus ornare viverra. Phasellus ac lorem ullamcorper, blandit lacus in, finibus ex. Aenean vestibulum, velit non lacinia sollicitudin, justo ipsum rhoncus est, in pulvinar tellus dolor sit amet ante. Duis sit amet velit varius mauris volutpat malesuada. Maecenas lacinia magna enim, vel pharetra nunc facilisis eu. Quisque ultricies quis sem rhoncus ornare. Ut et mauris sed augue suscipit pulvinar feugiat fringilla eros.</p>
            
            <hr />
            <p>Proin vel ultricies urna, vel sodales quam. In tincidunt, nibh non sodales tempus, lectus dolor consectetur felis, eget pharetra metus metus vitae ligula. Curabitur hendrerit nunc id tellus iaculis, quis placerat urna tincidunt. Cras sed varius lacus. Nullam augue purus, porta vitae mollis in, lobortis tincidunt lorem. Phasellus vulputate sed tellus at laoreet. Aliquam dolor nibh, auctor id egestas id, interdum quis enim. Pellentesque sapien odio, scelerisque vitae lacinia nec, aliquam at tortor. Curabitur eros ante, mattis nec faucibus ac, accumsan sit amet est. Aenean sit amet fringilla elit, eu convallis felis.</p>
            
            <blockquote>
            <p>Aliquam non egestas eros. In accumsan maximus lectus, sed laoreet ligula dignissim quis. Integer sem erat, semper vitae pharetra eget, imperdiet sit amet urna. Duis hendrerit lacus ut arcu hendrerit molestie. Donec quam erat, commodo in nisi non, fringilla dictum risus.</p>
            </blockquote>',
            'boton'=>'VISÍTALA YA!!',
            'link'=>'sgtepetate/',
            'fecha'=>'2020-05-28'
        ]);
    }
}
