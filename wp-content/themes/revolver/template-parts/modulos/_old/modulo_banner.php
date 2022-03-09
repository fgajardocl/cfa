

<div class="modulo_banner">
    <div class="cont">
        <?php if( have_rows('banner_slide') ): while ( have_rows('banner_slide') ) : the_row();?>
        <div class="item" style="background-image:url(<?php the_sub_field('imagen_fondo');?>)">
            <div class="wrap"><?php the_sub_field('contenido');?></div>
        </div>
        <?php $cnt++; endwhile; endif;?>
    </div>
</div>
<!-- modulo_banner -->


