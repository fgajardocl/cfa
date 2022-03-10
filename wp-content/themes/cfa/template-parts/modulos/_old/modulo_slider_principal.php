<div class="modulo_slider_principal">
    <div class="wrap">
        <div class="slide_1">
            <?php if( have_rows('item') ): while ( have_rows('item') ) : the_row();?>
            <a href="<?php the_sub_field('enlace');?>"  class="item">
                <img src="<?php the_sub_field('imagen_desktop');?>" class="desk">
                <img src="<?php the_sub_field('imagen_mobile');?>" class="mov">
            </a>
            <?php endwhile; endif;?>
        </div>
    </div>
</div>