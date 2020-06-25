<?php get_header(); ?>

<h2><?php the_title(); ?></h2>


<section id="index" class="left">
<div id="breadcrumbs"><?php get_breadcrumb(); ?></div>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php  while( have_posts()){
                the_post(); 
                the_content();
}?>     
        </div>
      
    <?php }
    else{
        echo 'pas de résultats';
    }?>

</section>   
<?php get_template_part('sidebar'); ?>
<?php get_footer(); ?>

