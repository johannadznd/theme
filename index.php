<?php get_header(); ?>
<div class="container">
    <div class="jumbotron">
        <h1>Hello</h1>
    </div>
</div>

<section>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php  while( have_posts()){
                the_post(); 
                get_template_part('content');
            }?>     
        </div>
      
    <?php }
    else{
        echo 'pas de résultats';
    }?>

</section>   

<?php get_footer(); ?>
