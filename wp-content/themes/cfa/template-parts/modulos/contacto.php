
        <section data-scroll-section>

<div class="contacto vh-100 flex-center">

    <div class="container">
        <div class="row pb-5 m-auto w-md-75">
            <div class="col-md-6 appear-y delay-8 duration-9" data-scroll>

                <div class="d-flex flex-column p-5">
                    <h3>Síguenos</h3>

                    <?php $cnt=0; if( have_rows('redes') ): while ( have_rows('redes') ) : the_row();?>
                        <a href="<?php the_sub_field('enlace')?>" target="_blank"> <?php the_sub_field('nombre')?> </a>
                    <?php $cnt++; endwhile; endif;?>
                </div>

            </div>
            <div class="col-md-6 appear-y delay-8 duration-9" data-scroll>
                <div class="p-5">
                    <h3> Contáctanos</h3>
                    <a href="mailto:<?php the_sub_field('email')?>"><?php the_sub_field('email')?></a>

                    <a href="tel:<?php the_sub_field('numero')?>"><?php the_sub_field('numero')?></a>
                </div>
            </div>
        </div>

        <div class="row pt-5 mx-auto w-md-75 border-md-top">
            <div class="col-md-6 appear-y delay-8 duration-9 border-sm-top" data-scroll>
                <div class="poli p-5">
                    <a href="<?php the_permalink(get_sub_field('politicas_privacidad'))?>">
                        <p class="ul-b"><?php echo get_the_title(get_sub_field('politicas_privacidad'))?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 appear-y delay-8 duration-9" data-scroll>
                <div class="add p-5">
                    <p><?php the_sub_field('direccion')?></p>
                </div>
            </div>
        </div>
    </div>


</div>
</section>