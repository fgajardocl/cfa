<div class="modulo_equipo">
    <div class="wrap">
        <div class="cont <?php the_sub_field('ancho');?>">
            <?php if( have_rows('equipo') ): while ( have_rows('equipo') ) : the_row();?>
            <div class="equipo">
                <div class="imagen" style="background-image:url(<?php the_sub_field('imagen');?>)">
                    <div class="hover"><div><?php the_sub_field('descripcion');?></div></div>
                </div>
                <div class="titulo"><?php the_sub_field('titulo');?></div>
            </div>
            <?php endwhile; endif;?>
        </div>
        <?php if(get_sub_field('label_boton')!=''){?>
        <div class="boton">
            <a href="<?php the_sub_field('enlace_boton');?>"><?php the_sub_field('label_boton');?></a>
        </div>
        <?php }?>
    </div>
</div>


