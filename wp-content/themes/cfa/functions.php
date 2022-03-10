<?php

if(!isset($_COOKIE['SHOWED_SPLASH'])){
    setcookie( "SHOWED_SPLASH", 1, strtotime( '+30 days' ) );
}

/*
<p><?php the_field('field_name', 'option'); ?></p>
*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
        'page_title' => __('Opciones Tema')
    ));
}

function my_admin_menu() {
    add_menu_page(
        __( 'Descarga de contactos', 'my-textdomain' ),
        __( 'Descarga de contactos', 'my-textdomain' ),
        'manage_options',
        'descarga-contactos',
        'my_admin_page_contents',
        'dashicons-download',
        90
    );
}

// add_action( 'admin_menu', 'my_admin_menu' );


function wpb_custom_new_menu() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Header Menu' ),
        'extra-menu' => __( 'Footer Menu' )
      )
    );
  }
  add_action( 'init', 'wpb_custom_new_menu' );

function getPuntuacionTotal(){
    
}

function my_admin_page_contents() {
        
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM xjjn_contacto" ); 
    ?>
        <h1>
            <?php esc_html_e( 'Descarga de contactos.', 'my-plugin-textdomain' ); ?>
        </h1>

        <script>
        const rows = [
            ["ID", "NOMBRE", "APELLIDO",  "EMPRESA", "TELEFONO", "RUT", "EMAIL", "PATENTE", "ADJUNTOS", "COMENTARIOS", "TIPO CONTACTO", "FECHA"],
            <?php

            $arrTipos = array('1'=>'contacto','2'=>'servicio');
            foreach($results as $row){
                
                echo '["'.$row->con_id.'", "'.
                    $row->con_nombre.'", "'.
                    $row->con_apellido.'", "'.
                    $row->con_empresa.'", "'.
                    $row->con_telefono.'", "'.
                    $row->con_rut.'", "'.
                    $row->con_mail.'", "'.
                    $row->con_patente.'", "'.
                    get_site_url().'/wp-content/uploads/uploads_contacts/'.$row->con_adjuntos.'", "'.
                    $row->con_comentarios.'", "'.
                    $arrTipos[$row->con_tipo_contacto].'", "'.
                    $row->con_fecha.'"],';
            }
            ?>
        ];

        let csvContent = "data:text/csv;charset=utf-8," 
            + rows.map(e => e.join(",")).join("\n");
            
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "contactos_<?php echo date("Ymd_His");?>.csv");
        document.body.appendChild(link); // Required for FF

        link.click(); // This will download the data file named "my_data.csv".
        </script>
    <?php
}

add_filter('use_block_editor_for_post', '__return_false', 10);

function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

add_theme_support( 'post-thumbnails' );
function create_posttype() {
 
    register_post_type( 'proyectos',
        array(
            'labels' => array(
                'name' => __( 'Proyectos' ),
                'singular_name' => __( 'Proyecto' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'proyectos'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'revisions' ,'thumbnail'),
            'taxonomies'  => array( 'category' ),
        )
    );
}
add_action( 'init', 'create_posttype' );

function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* USO TEMPORAL CUANDO NO MUESTRA LOS CUSTOM POST*/
// flush_rewrite_rules( false );


function admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');



/**
 * funcion que divide una cadena por un string y luego lo vuelve a juntar 
 * como pegamento con otro string
 */
function split_and_join_by_string($s,$delimiter,$tag_inicio,$tag_fin){
    $arr = explode($delimiter,$s);
    echo  $tag_inicio.implode($tag_fin.$tag_inicio,$arr).$tag_fin;
}


/**
 * funcion que divide una cadena por un string y luego lo vuelve a juntar 
 * como pegamento con otro string
 */
function split_and_join_revolver($s){
    $arr = str_split_unicode($s);
    $out = '';
    foreach($arr as $v){
        if($v=='Ø') $out .= '<span class="sky-blue">'.$v.'</span>';
        else $out .= '<span>'.$v.'</span>';
        
    }
    echo $out;
}

function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}