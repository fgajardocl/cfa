<?php
wp_reset_postdata();
$args = array(
    'cat'            => get_query_var('cat'),
    'post_type'      => 'proyectos',
    'posts_per_page' => -1,
);
    
$query = new WP_Query($args);

    // var_dump($my_query);
?>
    <main data-dpk="container" data-dpk-namespace="Project">
        <div data-scroll-container class="bg-white">
            <section data-scroll-section class="pro-2 p-header">
                <div class="container">
                    <div class="row row_proyectos_cat">

                        <?php $cnt=0; if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();?>
                        
                        <?php
                        global $post;
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );
                        ?>

                        <div class="<?php echo ($cnt%5==0) ? 'col-md-8':'col-md-4';?> layer appear-y" data-scroll>
                            <a href="<?php the_permalink()?>">
                                <div class="img_destacada" style="background-image:url(<?php echo $imgDestacada; ?>)"></div>
                                <img src="<?php echo $imgDestacada; ?>" alt="" class="img-fluid" />
                                <h3><?php the_title();?></h3>
                            </a>
                        </div>
                        <?php $cnt++; endwhile; wp_reset_postdata(); endif; ?>

                    </div>
                </div>
            </section>

        
        </div>
    </main>
    