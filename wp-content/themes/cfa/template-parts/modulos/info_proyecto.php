<section data-scroll-section class="numu">
    <div class="container py-12">
        <div class="row">
            <div class="col-md-7 d-flex flex-column justify-content-between">

                <div class="appear-y" data-scroll> 
                    <?php the_sub_field('descripcion')?>
                </div>

                <div class="img-detect" data-scroll>
                    <img src="<?php the_sub_field('imagen_abajo')?>" alt="" class="img-fluid">
                </div>
                
            </div>
            <div class="col-md-5">
                <div class="img-detect" data-scroll>
                    <img src="<?php the_sub_field('imagen_derecha')?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</section>