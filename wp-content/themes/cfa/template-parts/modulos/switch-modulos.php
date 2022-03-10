<?php

if( have_rows('modulos') ): while ( have_rows('modulos') ) : the_row();

    get_template_part( 'template-parts/modulos/modulo_'.get_row_layout());

endwhile; endif;