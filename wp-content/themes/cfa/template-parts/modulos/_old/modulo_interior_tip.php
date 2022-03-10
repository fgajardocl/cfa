<div class="modulo_interior_tip">
    <div class="wrap">
        <div class="cont" style="background-image:url(<?php the_sub_field('background');?>)">
            <div class="titulo">
                <h1><?php the_sub_field('titulo');?></h1>
                <h2><?php the_sub_field('subtitulo');?></h2>
            </div>
            <div class="descripcion">
                <div class="flex">
                    <div class="box">
                    <?php the_sub_field('descripcion');?>
                    </div>
                    <div class="box">
                        <a href="<?php the_sub_field('enlace_producto');?>" class="producto">
                            <img src="<?php the_sub_field('imagen_producto');?>">
                            <span class="btn">VER PRODUCTO</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>