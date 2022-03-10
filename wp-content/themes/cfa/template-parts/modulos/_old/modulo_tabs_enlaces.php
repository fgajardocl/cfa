<div class="modulo_tabs_enlaces">
    <div class="wrap">
        <div class="tabs">
            <?php if( have_rows('tab') ): while ( have_rows('tab') ) : the_row();?>
            <a href="<?php the_sub_field('enlace');?>" class="tab <?php the_sub_field('activo');?>">
                <span><?php the_sub_field('texto');?></span>
            </a>
            <?php endwhile; endif;?>
        </div>
    </div>
</div>