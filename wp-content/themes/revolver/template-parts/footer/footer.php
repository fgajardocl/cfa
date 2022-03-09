<footer>
    <div class="wrap">
        <div class="cont">
            <div><?php the_field('columna_1', 'option'); ?></div>
            <div><?php the_field('columna_2', 'option'); ?></div>
            <div>
                <h2>SÍGUENOS</h2>
                <?php if( have_rows('redes', 'option') ): ?>
                <div class="rrss">
                    <ul>
                        <?php while ( have_rows('redes', 'option') ) : the_row();?>
                        <li>
                            <a href="<?php the_sub_field('enlace', 'option');?>" target="_blank"><img src="<?php the_sub_field('icono', 'option');?>"></a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="copy">
            <?php the_field('texto_copyright', 'option'); ?>
        </div>
    </div>
</footer>