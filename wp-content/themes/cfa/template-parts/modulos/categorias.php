<?php
   $args = array(
               'type'    => 'proyectos',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

   $cats = get_categories($args);
?>
<section data-scroll-section class="pro-1 p-header">
    <div class="container">
        <div class="row">
            <?php foreach($cats as $cat) {?>
                <?php
                $image = get_field('imagen_destacada', get_term($cat->term_id));
                ?>
                <div class="col-md-6 layer appear-y" data-scroll>
                    <a href="<?php echo get_category_link( $cat->term_id ) ?>">
                        <img src="<?php echo $image ?>" alt="" class="img-fluid" />
                        <h3><?php echo $cat->name; ?></h3>
                    </a>
                </div>
            <?php }?>
        </div>
    </div>
</section>