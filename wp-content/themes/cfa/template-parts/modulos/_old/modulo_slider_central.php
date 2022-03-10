<div class="modulo_slider_central">
    <div class="cont">
        <?php if( have_rows('slider') ): while ( have_rows('slider') ) : the_row();?>
        <div class="item" style="background-image:url(<?php the_sub_field('imagen');?>)">
            <div class="wrap"><div><?php the_sub_field('contenido');?></div></div>
        </div>
        <?php $cnt++; endwhile; endif;?>
    </div>
</div>



