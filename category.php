<?php get_header(); ?>

<section>

    <div>
    <p>Archive de la catégorie <?php single_cat_title( "",true); ?></p>
    </div>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php  while( have_posts()){
                the_post(); 
                get_template_part('content');
            } ?>     
        </div>
      
    <?php }
    else{
        echo 'pas de résultats';
    }?>

</section>   

<?php get_footer(); ?>

