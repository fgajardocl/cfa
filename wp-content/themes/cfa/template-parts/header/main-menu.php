<header>
    <div class="wrap">
        <div class="cont">
            <div class="top">
                <a href="<?php echo get_site_url().'/';?>" class="logo">
                    <img src="<?php the_field('logo_top_izquierda', 'option'); ?>">
                </a>
                <a href="<?php echo get_site_url().'/';?>" class="logo-der">
                    <img src="<?php the_field('logo_top_derecha', 'option'); ?>">
                </a>
            </div>

            <div class="bottom">
                <?php
                wp_nav_menu( array( 
                    'theme_location' => 'main-menu', 
                    'container_class' => 'nav' ) ); 
                ?>
            </div>

            <div class="swMenu">
                <div></div><div></div><div></div>
            </div>
        </div>
    </div>
</header>
