<section data-scroll-section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                
                <?php if(get_sub_field('imagen')!=''){?>
                    <img src="<?php the_sub_field('imagen')?>" alt="" data-scroll class="appear-y img-fluid py-4" />
                <?php }?>
                <?php if(get_sub_field('video')!=''){?>
                    <div class="wrap-video">
                        <video width="800" height="500" id="bannerVid" preload="metadata"
                            <?php if(get_sub_field('autoplay')){?>
                                autoplay="" muted="" playsinline=""
                            <?php }?>
                            <?php if(get_sub_field('loop')){?>
                                loop="" 
                            <?php }?>
                            <?php if(get_sub_field('controls')){?>
                                controls=""
                            <?php }?>>
                            <source src="<?php the_sub_field('video')?>#t=0.5" type="video/mp4">
                        </video>
                    </div>
                <?php }?>
                <?php if(get_sub_field('embed')!=''){?>
                    <div class="iframe"><?php the_sub_field('embed')?></div>
                <?php }?>
                
            </div>
        </div>
    </div>
</section>