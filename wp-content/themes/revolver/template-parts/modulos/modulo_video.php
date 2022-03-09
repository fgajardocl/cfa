<section data-scroll-section class="modulo_video">
    <?php if(get_sub_field('video')!=''){?>
    <video width="320" height="240" controls>
        <source src="<?php the_sub_field('video');?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <?php }?>
    <?php if(get_sub_field('embed')!=''){?>
    <div class="iframe">
        <?php the_sub_field('embed');?>
    </div>
    <?php }?>
</section>