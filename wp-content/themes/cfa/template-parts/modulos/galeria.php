<section data-scroll-section class="py-12">

<div class="container">
    <div class="row">
        
        <?php $cnt=0; if( have_rows('imagenes') ): while ( have_rows('imagenes') ) : the_row();?>
            <div class="col-md-6 col-xl-4 pb-4 appear-y delay-8" data-scroll>                           
                <img src="<?php the_sub_field('imagen')?>" alt="" class="img-fluid">
            </div>
        <?php $cnt++; endwhile; endif;?>

    </div>
</div>

</section>