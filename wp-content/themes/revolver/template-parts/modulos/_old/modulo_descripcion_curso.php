<div class="modulo_descripcion_curso">
    <div class="wrap">
        <div class="cont <?php the_sub_field('estilo');?>">
            <div><img src="<?php the_sub_field('icono');?>"></div>
            <div>
                <div class="descripcion"><?php the_sub_field('descripcion');?></div>
                <h2><?php the_sub_field('titulo_puntos');?></h2>
                <div class="listado">
                    <?php if( have_rows('puntos') ): while ( have_rows('puntos') ) : the_row();?>
                    <div class="puntos">
                        <div class="punto"><?php the_sub_field('punto');?></div>
                        <div class="texto"><?php the_sub_field('texto');?></div>
                    </div>
                    <?php endwhile; endif;?>
                </div>
                <?php if(get_sub_field('label_boton_mas')!=''){?>
                <div class="btn-mas"><a href="<?php the_sub_field('enlace_boton_mas');?>"><?php the_sub_field('label_boton_mas');?></a></div>
                <?php }?>
            </div>
            
        </div>
    </div>
</div>


