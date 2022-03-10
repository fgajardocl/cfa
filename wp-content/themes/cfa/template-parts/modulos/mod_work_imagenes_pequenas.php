<section data-scroll-section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">

                <div class="row appear-y" data-scroll data-scroll-offset="20%">
                    <?php $cnt=0; if( have_rows('imagenes') ): while ( have_rows('imagenes') ) : the_row();?>

                        <div class="col-3">
                            <img src="<?php the_sub_field('imagen');?>" alt="" class="img-fluid" />
                        </div>

                        <?php if($cnt%4==0 && $cnt!=0){?>
                        </div><div class="row appear-y" data-scroll data-scroll-offset="20%">
                        <?php }?>

                    <?php $cnt++; endwhile; endif;?>
                </div>
                
            </div>
        </div>
    </div>
</section>