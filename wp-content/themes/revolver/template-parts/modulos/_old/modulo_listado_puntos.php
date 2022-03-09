<div class="modulo_listado_puntos">
    <div class="wrap">
        <div class="cont">
            <h2><?php the_sub_field('titulo');?></h2>
            <div class="listado">
                <?php if( have_rows('puntos') ): while ( have_rows('puntos') ) : the_row();?>
                <div class="puntos">
                    <div class="punto"><?php the_sub_field('numero');?></div>
                    <div class="texto"><?php the_sub_field('texto');?></div>
                </div>
                <?php endwhile; endif;?>
            </div>
        </div>
    </div>
</div>


