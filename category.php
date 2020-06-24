<?php get_header(); ?>

<h2>Archive de la catégorie <?php single_cat_title( "",true); ?></h2>

<section id="sec_art" class="left">
<?php

if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}

?>
    <?php  if (have_posts()){ ?>
        <div id='description' ><?php the_archive_description();?></div> 
            <?php  while( have_posts()){
                the_post(); 
                get_template_part('content');
            } ?>     
      
    <?php }
    else{
        echo 'pas de résultats';
    }?>

</section>   
<?php get_template_part('sidebar');
get_template_part('pagination'); 


get_footer(); ?>

