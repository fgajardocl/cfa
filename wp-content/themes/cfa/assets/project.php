<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CFA</title>
    <link rel="icon" type="image/png" sizes="64x64" href="img/fav.png" />
    <link rel="stylesheet" href="css/dpk10.css" />
</head>

<body data-dpk="wrapper">

    <?php get_template_part('assets/include/menu-desktop')?>

    <main data-dpk="container" data-dpk-namespace="Home">
        <div data-scroll-container class="bg-white">

            <section data-scroll-section class="nos-2">

            </section>



            <section data-scroll-section class="numu">
                <div class="container py-12">
                    <div class="row">
                        <div class="col-md-7 d-flex flex-column justify-content-between">

                            <div class="appear-y" data-scroll> 
                                <h2>NUMU</h2>

                                <p>
                                    <span>Arquitecto:</span> Cristián Fernández E <br>
                                    <span>Colaborador:</span> Matías González, Valdés Haggeman, Carlos ulloa <br>
                                    <span>Lugar:</span> Parque Bicentenario, Región Metropolitana. Chile <br>
                                    <span>Superficie:</span> 130 m2 Proyecto en construcción<br>
                                    <span>Año:</span> 2020 
                                </p>

                            </div>

                            <div class="img-detect" data-scroll>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/n1.png" alt="" class="img-fluid">
                                </div>



                        </div>
                        <div class="col-md-5">
                            <div class="img-detect" data-scroll>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/n2.png" alt="" class="img-fluid">
                                </div>
                        </div>
                    </div>
                </div>

            </section>



            <section data-scroll-section>
                <!-- <div class="container"> 
                    <div class="img-detect" data-scroll><img src="<?php echo get_template_directory_uri(); ?>/assets/img/n3.jpg"  class="img-fluid"></div>
                </div> -->

                <?php get_template_part('assets/include/slider')?>    

            </section>


           

        </div>
    </main>

    <script src="js/bundle.js"></script>
</body>

</html>