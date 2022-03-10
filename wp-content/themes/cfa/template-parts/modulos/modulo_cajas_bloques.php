
<section data-scroll-section>
    <div class="container-fluid px-0 pt-md-5 modulo_cajas_bloques">
        <div class="row g-2">
            <?php if( have_rows('caja') ): while ( have_rows('caja') ) : the_row();?>
            <div class="<?php the_sub_field('ancho');?>">
                <img src="<?php the_sub_field('imagen');?>" class="img-fluid" />
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>