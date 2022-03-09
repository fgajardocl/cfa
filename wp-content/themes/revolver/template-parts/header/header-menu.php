<?php
$items_menu_es = array();
$items_menu_es[] = array('label'=>'Nosotros',      'link'=>'/nosotros');
$items_menu_es[] = array('label'=>'Productos',     'link'=>'/productos');
$items_menu_es[] = array('label'=>'Servicios',     'link'=>'/servicios');
$items_menu_es[] = array('label'=>'Certificados',  'link'=>'/certificados');
$items_menu_es[] = array('label'=>'Noticias',      'link'=>'/noticias');
$items_menu_es[] = array('label'=>'Contacto',      'link'=>'/contacto');

$items_menu_en = array();
$items_menu_en[] = array('label'=>'Us',            'link'=>'/nosotros');
$items_menu_en[] = array('label'=>'Products',      'link'=>'/productos');
$items_menu_en[] = array('label'=>'Services',      'link'=>'/servicios');
$items_menu_en[] = array('label'=>'Certificates',  'link'=>'/certificados');
$items_menu_en[] = array('label'=>'News',          'link'=>'/noticias');
$items_menu_en[] = array('label'=>'Contact',       'link'=>'/contacto');

if(_LANG=='_en'){
    $items_menu = $items_menu_en;
}else{
    $items_menu = $items_menu_es;
}
    
?>
    <div class="topNav">
        <ul>
            <li><a href="#">Trabaja con nosotros</a> </li>
            <li><a href="#">Clientes</a> </li>
            <?php if(_LANG=='_en'){?>
                <li><a href="<?php echo get_template_directory_uri();?>/php/lang.php?lang=es"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/flag-en.png"> ESPAÑOL</a> </li>
            <?php }else{?>
                <li><a href="<?php echo get_template_directory_uri();?>/php/lang.php?lang=en"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/flag-en.png"> ENGLISH</a> </li>
            <?php }?>
        </ul>
    </div>
    
    <div class="menu">
        <div>
            <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-head2.png" class="logo"></div>
            <div>
                <ul>
                    <?php foreach($items_menu as $k=>$v){?>
                    <li><a href="<?php echo get_site_url().$v['link'];?>"><?php echo $v['label'];?></a> </li>
                    <?php }?>
                </ul>
                <div class="swClose">
                    <div></div><div></div>
                </div>
            </div>
            <div>
                <form action="<?php echo get_site_url()?>/productos" enctype="multipart/form-data" method="get">
                    <input name="search" type="text" placeholder="<?php echo _LANG=='_en'?'Search Product':'Buscar Producto';?>...">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search.png" class="searchBtn">
                </form>
            </div>
            
            <div class="swMenu">
                <div></div><div></div><div></div>
            </div>
        </div>
    </div>

<!--
    <section class="buscadorProducto">
        <div class="wrap">
            <div>BuscarProducto:</div>
            <div><input type="text" name="inputBuscarProducto" class="inputBuscarProducto"> </div>
            <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search-white.png" class="imgBuscar"> </div>
        </div>
    </section>
-->







