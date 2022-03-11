

    <main data-dpk="container" data-dpk-namespace="Home">
        <div data-scroll-container class="bg-white">
            <section data-scroll-section class="home-page">
                
                <?php
                if( have_rows('modulos') ): while ( have_rows('modulos') ) : the_row();
                    get_template_part( 'template-parts/modulos/'.get_row_layout());
                endwhile; endif;
                ?>

                <a href="estudio" class="p-btn">Empresa B</a>
            </section>
        </div>
    </main>
    