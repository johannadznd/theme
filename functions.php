<?php

function lgmac_session_start(){
    if( !session_id() ){
        @session_start();
    }
}

add_action('init','lgmac_session_start');

define('LGMAC_VERSION', '1.0.0');

function lgmac_scripts() {
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), 1, true);
    wp_enqueue_script('boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery', 'popper'), 1, true);
    wp_enqueue_style( 'lgmac_custom', get_template_directory_uri() . '/style.css', array('bootstrap'), LGMAC_VERSION , 'all' );
    wp_enqueue_script( 'lgmac_script', get_template_directory_uri() . '/js/Cleatis.js', array('jquery'), LGMAC_VERSION , true );
}

add_action('wp_enqueue_scripts', 'lgmac_scripts');


include ('build-contact-form.php');



function lgmac_setup(){

    add_theme_support( 'post-thumbnails' );

    require_once('includes/wp_bootstrap_navwalker.php');

    register_nav_menus( array('primary' => 'principal'));
}

add_action('after_setup_theme','lgmac_setup');


function lgmac_give_me_meta($date1, $date2, $cat,$tags){
    
    $chaine  = 'publié le <time class="entry-date" datetime="';
    $chaine .= $date1;
    $chaine .= '">';
    $chaine .= $date2;
    $chaine .= '</time> dans la catégorie ';
    $chaine .= $cat; 
    if (strlen($tags) > 0 ){
         $chaine .= ' avec les étiquettes: '.$tags;
    }
    return $chaine;
}


function new_excerpt_more( $more ) {
    return ' <a class="more-link" href="' .get_permalink()  .'">' . 'Lire la suite' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function lgmac_widgets_init(){
    register_sidebar(array(
        'name'          => 'Footer Widget Zone',
        'descritpion'   => 'Widgets affichés dans le footer: 4 au maximum',
        'id'            => 'widgetized-footer',
        'before_widget' => '<div id="%1$s class="col-xs-3 %2$s"><div class="inside-widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h2 class="h3 text-center">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init','lgmac_widgets_init');


function my_image_sizes($sizes) {

    $addsizes =array(
        "medium_large"  => "Medium Large"
    
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

add_filter('image_size_names_choose', 'my_image_sizes');
