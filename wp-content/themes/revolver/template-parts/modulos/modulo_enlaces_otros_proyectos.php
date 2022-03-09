
<section data-scroll-section>
    
    <div class="d-flex container justify-content-between py-5 fs-2 seccion_botones_proyecto">
        <a href="<?php the_sub_field('enlace_izquierdo');?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/plus-black.svg">
            &nbsp; &nbsp; &nbsp; <?php the_sub_field('nombre_izquierdo');?>
        </a>

        <a href="<?php the_sub_field('enlace_derecho');?>" class="pl-4">
            <?php the_sub_field('nombre_derecho');?> &nbsp; &nbsp; &nbsp;
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-down-black.svg">
        </a>
    </div>
</section> 