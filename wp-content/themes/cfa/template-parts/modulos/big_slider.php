
<section data-scroll-section>
    <div class="project-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                
                <?php $cnt=0; if( have_rows('slide') ): while ( have_rows('slide') ) : the_row();?>
                <div class="swiper-slide">
                    <div class="swiper-image" data-swiper-parallax="50%">
                        <div class="swiper-image-inner _desk" style="background-image: url('<?php the_sub_field('imagen_desk')?>')"></div>
                        <div class="swiper-image-inner _mov" style="background-image: url('<?php the_sub_field('imagen_mobile')?>')"></div>
                    </div>
                </div>
                <?php $cnt++; endwhile; endif;?>
            
            </div>
        </div>

        <div class="left dpk-hover" data-hover-text="←" data-hover-class="dpkSlideButton"></div>
        <div class="right dpk-hover" data-hover-text="→" data-hover-class="dpkSlideButton"></div>
    </div>
</section>