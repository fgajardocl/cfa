<div class="modulo_cajas_desplazadas">
    <div class="wrap">
        <div class="cont">
            <?php if( have_rows('caja') ): while ( have_rows('caja') ) : the_row();?>
            <div class="caja" style="background-image:url(<?php the_sub_field('imagen');?>)">
                <div>
                    <h2><?php the_sub_field('titulo');?></h2>
                    <a href="<?php the_sub_field('enlace_boton');?>"><?php the_sub_field('label_boton');?></a>
                </div>
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</div>