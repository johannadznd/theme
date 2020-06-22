<?php get_header(); ?>

<h2>Blog</h2>
<section id="sec_art">
    <?php  
        if (have_posts()){ ?>
                <?php  while( have_posts()){
                    the_post(); 
                    get_template_part('content');
                }?>     
        <?php }
        else{
            echo 'pas de résultats';
        }?>

</section>


<?php get_footer(); ?>

