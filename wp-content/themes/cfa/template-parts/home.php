<div animation="cont_popup">
<header>
    <div class="wrap">
        <div>
            <a href="<?php echo get_site_url();?>/" animelement><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" class="logo"></a>
            <p animelement>¿Eres una persona de <strong>relaciones duraderas?</strong></p>
            
            <div class="rrss">
                <span>Síguenos</span>
                <a href="https://www.instagram.com/relaciones_.toxicas/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rs-ig.svg"></a>
                <a href="https://www.facebook.com/Relaciones-t%C3%B3xicas-102512971802175" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rs-fb.svg"></a>
            </div>
        </div>
    </div>
</header>

<div class="franja">
    <div class="wrap">
        <div>
            <div class="counterCont">
                <img animelement src="<?php echo get_template_directory_uri(); ?>/assets/img/titulo.svg" class="tit1">
                <div id="countdown" class="counter" animelement>
                    <div class="numero"><span class="days">00</span><label>DÍAS</label></div>
                    <div class="sep"></div>
                    <div class="numero"><span class="hours">00</span><label>HORAS</label></div>
                    <div class="sep"></div>
                    <div class="numero"><span class="minutes">00</span><label>MINUTOS</label></div>
                    <div class="sep"></div>
                    <div class="numero"><span class="seconds">00</span><label>SEGUNDOS</label></div>
                </div>
            </div>
        </div>
        <div>
            <?php get_template_part( 'template-parts/quiz/quiz' );?>
        </div>
    </div>
</div>
</div>


<div class="interes">
    <div class="wrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/titulo2.svg" class="tit2" animation="popup">
        
        <?php 
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
        );

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : ?>
        <div class="slider" animation="cont_popup">

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <a class="item" animelement href="<?php the_permalink();?>">
                <div class="img" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
                <h4><?php the_title();?></h4>
                <p><?php the_excerpt();?></p>
                <span class="a"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-ver-mas.svg"></span>
            </a>
            <?php endwhile; ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>