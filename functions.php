<?php

function jd_session_start(){
    if( !session_id() ){
        @session_start();
    }
}

add_action('init','jd_session_start');

define('JD_VERSION', '1.0.0');

function jd_scripts() {
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), 1, true);
    wp_enqueue_script('boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery', 'popper'), 1, true);
    wp_enqueue_style( 'jd_custom', get_template_directory_uri() . '/style.css', array('bootstrap'), JD_VERSION , 'all' );
    wp_enqueue_script( 'jd_script', get_template_directory_uri() . '/js/Cleatis.js', array('jquery'), JD_VERSION , true );
    wp_localize_script( 'jd_ajax_script', 'ajaxVars', array('url' => admin_url('/admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'jd_scripts');


include ('build-contact-form.php');



function jd_setup(){

    add_theme_support( 'post-thumbnails' );

    require_once('includes/wp_bootstrap_navwalker.php');

    register_nav_menus( array('primary' => 'principal'));
}

add_action('after_setup_theme','jd_setup');


function jd_give_me_meta($date1, $date2, $cat){
    
    $chaine  = 'Publié le <time class="entry-date" datetime="';
    $chaine .= $date1;
    $chaine .= '">';
    $chaine .= $date2;
    $chaine .= '</time> dans la catégorie ';
    $chaine .= $cat; 

    return $chaine;
}



function jd_widgets_init(){
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

add_action('widgets_init','jd_widgets_init');


function jd_widgets_sidebar(){
    register_sidebar(
        array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar',
            'description'   => 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

add_action('widgets_init','jd_widgets_sidebar');


function my_image_sizes($sizes) {

    $addsizes =array(
        "medium_large"  => "Medium Large"
    
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

add_filter('image_size_names_choose', 'my_image_sizes');


function jd_admin_init() {

    function jd_admin_scripts(){
        if (!isset($_GET['page']) || $_GET['page'] == "messages_reçus" ){
            return;
        }
    
       wp_enqueue_media();
       wp_enqueue_script( 'jd-admin-init', get_template_directory_uri() . '/js/admin-message.js', array(), JD_VERSION, true );	
      
    }
   
    add_action('admin_enqueue_scripts', 'jd_admin_scripts' );

}  // fin jd_admin_init

add_action('admin_init', 'jd_admin_init');
add_action('wp_ajax_delete_message', 'fn_delete_message');


function fn_delete_message() {
	$id = $_POST['id'];
	global $wpdb;
	$tablename = $wpdb->prefix . "contacts";
	
	$sql = "DELETE FROM `$tablename`  WHERE `ctc_id`= '$id'";
	$result_delete = $wpdb->query($sql); 

	if($result_delete == 1):
		echo 'success';
	else:
		echo 'failure';
	endif;

	die();
}

function get_breadcrumb() {

    ?>
    <span>

    <?php 
    echo '<a href="'.home_url().'">Accueil</a>';
    if (is_single()) {
        echo " > ";
        the_category(' &bull; ');
            if (is_single()) {
                echo " > ";
                the_title();
            }
        }
    if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true);
            }
            echo ' > ';
            echo 'Catégorie : ' . single_cat_title('', false);
    }
    elseif (is_page()) {
        echo " > ";
        echo the_title();
    
    } 
    elseif (is_home()) {
        echo " > ";
        echo 'Blog';
    
    } 
    ?>    
    </span>
   
    <?php
}
