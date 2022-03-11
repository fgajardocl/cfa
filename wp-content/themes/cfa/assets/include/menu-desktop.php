<header class="container"></header>

<div class="header container">
  <a href="<?php echo get_site_url();?>/" class="logo link"> CRISTIÁN FERNÁNDEZ ARQUITECTOS </a>
  
  <div class="menu-btn">
    <span></span>
  </div>
</div>

<div class="menu-wrap">
  <!-- <ul>
    <li class="link"><a href="<?php echo get_site_url();?>/estudio"> Nosotros </a></li>
    <li class="link"><a href="<?php echo get_site_url();?>/nosotros"> Estudio </a></li>
    <li class="link"><a href="<?php echo get_site_url();?>/proyectos"> Proyectos </a></li>
    <li class="link"><a href="<?php echo get_site_url();?>/contacto"> Contacto </a></li>
    <li class="link"><a href="<?php echo get_site_url();?>/cfa"> +CFA </a></li>
  </ul> -->
  
  <?php
    wp_nav_menu( array( 
        'theme_location' => 'main-menu', 
        'container_class' => 'nav' ) ); 
    ?>
</div>

<div class="logoCFA">

  <div id="logoCFA"></div>

</div>