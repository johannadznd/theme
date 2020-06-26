<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 

    if (is_home()){?>
    <meta name="description" content="Le site présente la page des articles du blog"> 
    <?php } 

    if(is_front_page()){ ?>
    <meta name="description" content="Le site présente la page d'accueil statique"> 
    <?php }

    if (is_page() && !is_front_page()){ ?>
    <meta name="description" content="Le site présente un contenu de type page">
    <?php } 

    if (is_category()){?>
    <meta name="description" content="Liste des articles pour la catégorie <?php echo single_cat_title('',false); ?>">  
    <?php }

    if( is_tag() ){?>
    <meta name="description" content="Liste des articles reliés à l'étiquette <?php echo single_tag_title('',false); ?>">
    <?php }

    wp_head(); ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
<?php if ( has_custom_logo() ) : ?>
		<div class="navbar-brand"><?php the_custom_logo(); ?></div>
	<?php endif; ?>
	<?php $blog_info = get_bloginfo( 'name' ); ?>
	<?php if ( ! empty( $blog_info ) ) : ?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; 
 
   $description = get_bloginfo( 'description' );
	if ( $description || is_customize_preview() ) :
		?>
			<p class="description">
				<?php echo $description; ?>
			</p>
	<?php endif; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


    <div>
        <?php
            wp_nav_menu( array(
                'menu'              => 'top-menu',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarNav',
                'menu_class'        => 'navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker,
            ))
        ?>
    </div>
</nav>





