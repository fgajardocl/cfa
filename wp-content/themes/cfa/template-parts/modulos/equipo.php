<?php

$arrEquipo = array();
if( have_rows('equipo') ): while ( have_rows('equipo') ) : the_row();
    $arrEquipo[] = array(
        'nombre' => get_sub_field('nombre'),
        'cargo' => get_sub_field('cargo'),
        'email' => get_sub_field('email'),
    );
endwhile; endif;

$arrEquipoChunk = array_chunk($arrEquipo, ceil(count($arrEquipo)/3) );

?>

<section data-scroll-section class="nos-1">
    <div class="container">
        <div class="row">

            <?php foreach($arrEquipoChunk as $arrEquipo){?>
                <div class="col-xl-2 col-md-3 col-6">
                <?php foreach($arrEquipo as $equipo){?>
                    <div class="member appear-yy" data-scroll>
                        <h3><?php echo $equipo['nombre']?></h3>
                        <p><?php echo $equipo['nombre']?></p>
                        <a href="mailto:<?php echo $equipo['email']?>"> <?php echo $equipo['email']?> </a>
                    </div>
                <?php }?>
                </div>
            <?php }?>
            

            <div class="col-xl-6 col-md-3 col-6 appear-y mt-auto mt-md-0" data-scroll>
                <p class="text-md-end ms-auto">
                    <?php the_sub_field('texto_derecha')?>
                </p>
            </div>
        </div>
    </div>
</section>
