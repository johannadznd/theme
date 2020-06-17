<?php get_header(); ?>

<section>

    <div>
        <p>Liste des articles avec l'étiquette <?php single_cat_title(); ?></p>
    </div>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php 
                while( have_posts()){
                    the_post(); 
                    get_template_part('content');
                } 
            ?>     
        </div>
    <?php }
    else{
        echo 'pas de résultats';
    }?>

</section>   

<?php get_footer(); ?>

