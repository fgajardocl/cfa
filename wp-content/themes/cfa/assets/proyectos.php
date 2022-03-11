
    <main data-dpk="container" data-dpk-namespace="Home">
        <div data-scroll-container class="bg-white">

            <?php
            if( have_rows('modulos') ): while ( have_rows('modulos') ) : the_row();
                get_template_part( 'template-parts/modulos/'.get_row_layout());
            endwhile; endif;
            ?>

        </div>
    </main>
    