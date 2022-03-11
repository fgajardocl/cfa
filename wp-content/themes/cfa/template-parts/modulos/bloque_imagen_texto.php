<section data-scroll-section >

<?php $cnt=0; if( have_rows('bloque') ): while ( have_rows('bloque') ) : the_row();?>
<div class="container p-0 <?php the_sub_field('estilo_caja')?>">

    <div class="row">
        <?php if(get_sub_field('orientacion_imagen')=='izq'){?>
        <div class="col-md-6 p-0">
            <div class="img-detect" data-scroll>
                <img src="<?php the_sub_field('imagen')?>" alt="" class="img-fluid">
            </div>
        </div>
        <?php }?>

        <div class="col-md-6 flex-center">
            <p class="appear-y" data-scroll>
                <?php the_sub_field('texto')?>
            </p>
        </div>

        <?php if(get_sub_field('orientacion_imagen')=='der'){?>
        <div class="col-md-6 p-0">
            <div class="img-detect" data-scroll>
                <img src="<?php the_sub_field('imagen')?>" alt="" class="img-fluid">
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php $cnt++; endwhile; endif;?>

</section>