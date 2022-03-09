<div class="modulo_alianzas">
    <div class="wrap">
        <div class="cont">
            <h2><?php the_sub_field('titulo');?></h2>
            <div class="lista">
                <?php if( have_rows('alianza') ): while ( have_rows('alianza') ) : the_row();?>
                <a class="logo" href="<?php the_sub_field('enlace');?>">
                    <img src="<?php the_sub_field('logo');?>">
                </a>
                <?php endwhile; endif;?>
            </div>
        </div>
    </div>
</div>