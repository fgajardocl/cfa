<div class="contInteriror">
    
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
    </div>

    <div class="franja ">
        <div class="wrap">
            <div>
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                ?>
            </div>
            <div>
                <?php get_template_part( 'template-parts/quiz/quiz' );?>
            </div>
        </div>
    </div>
    
    <div class="contenido">
        <div class="wrap">
            <?php the_content();?>
        </div>
    </div>
</div>


<div class="bgBottom"></div>