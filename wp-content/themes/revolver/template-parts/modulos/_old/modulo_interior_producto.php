<div class="modulo_interior_producto">
    <div class="wrap">
        <div class="cont">
            <h1><?php the_sub_field('titulo');?></h1>
            <div class="flex">
                <div class="box">
                    <div class="imagenProducto">
                        <img src="<?php the_sub_field('imagen_producto');?>">
                        <a href="<?php the_sub_field('enlace_comprar');?>" class="btn btn-comprar">COMPRAR</a>
                    </div>
                    <div class="relacionado">
                        <h2>Productos <strong>Relacionados</strong></h2>
                        <a href="<?php the_sub_field('enlace_producto_relacionado');?>">
                            <img src="<?php the_sub_field('imagen_producto_relacionado');?>">
                            <span class="btn btn-comprar"><?php the_sub_field('texto_boton_producto_relacionado');?></span>
                        </a>
                    </div>
                </div>
                <div class="box">
                    <div class="imagenProducto imagenProducto_mobile">
                        <img src="<?php the_sub_field('imagen_producto');?>">
                        <a href="<?php the_sub_field('enlace_comprar');?>" class="btn btn-comprar">COMPRAR</a>
                    </div>
                    <?php if( have_rows('detalle') ): while ( have_rows('detalle') ) : the_row();?>
                    <div class="detalle">
                        <h3>
                            <img src="<?php the_sub_field('icono');?>">
                            <span><?php the_sub_field('titulo');?></span>
                        </h3>
                        <div class="desc"><?php the_sub_field('descripcion');?></div>
                    </div>
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>
    </div>
</div>