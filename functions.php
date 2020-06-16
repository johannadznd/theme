<?php


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


function lgmac_setup(){
    add_theme_support( 'post-thumbnails' );

    require_once('includes/wp_bootstrap_navwalker.php');

    register_nav_menus( array('primary' => 'principal'));
}

add_action('after_setup_theme','lgmac_setup');

function lgmac_give_me_meta($date1, $date2, $cat){
    $chaine  = 'publié le <time class="entry-date" datetime="';
    $chaine .= $date1;
    $chaine .= '">';
    $chaine .= $date2;
    $chaine .= '</time> dans la catégorie ';
    $chaine .= $cat;

    return $chaine;
}