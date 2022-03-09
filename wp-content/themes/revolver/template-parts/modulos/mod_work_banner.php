<section data-scroll-section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1 class="work-title w-animate">
                    <!-- <span>W</span><span class="sky-blue">Ø</span><span>R</span><span>K</span> -->
                    <?php split_and_join_revolver(get_sub_field('titulo'));?>
                </h1>

                <p class="g-bold work-desc m-animate text-justufy ps-xl-4">
                    <?php the_sub_field('descripcion');?>
                </p>

                <a href="#here" data-scroll-to class="flex-center pt-10 pb-xl-5 m-animate">
                    <div class="hover-wheel1 mb-5" data-scroll>
                        <span class="wheel p-2">
                            <svg fill="#fff" height="10rem" width="10rem">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/icon.svg#wheel" />
                            </svg>
                        </span>

                        <svg class="rrr" height="5rem" width="5rem">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/icon.svg#r-black" />
                        </svg>
                    </div>


                    <div class="scroll-v ml-5" data-scroll>
                        <span class="add-stroke">V</span>
                        <span class="add-stroke">V</span>
                        <span class="add-stroke">V</span>
                        <span class="add-stroke"></span>

                    </div>
                </a>

            </div>
        </div>
    </div>
</section>