<?php get_header(); ?>

<?php
if (isset($_SESSION['contact-result'])){?>

    <div class="container">
         <div class="row">
            <div class="col">
                <div class="bg-success text-white text-center p-3 mb-3">
                    <p class="mb-0"><?php echo $_SESSION['contact-result'];?></p>
                </div>
            </div>
         </div>
    </div>

<?php } ?> 
<!-- Affiche message pour formulaire envoyé -->

<section>
        <?php if(have_posts()){
            while(have_posts()){
                the_post(); 
                        
                        the_title('<h1 class=>','</h1>');?>
                    <div>
                         <article>
                            <?php the_content(); ?>  
                        </article>
                    </div>
                       
                        
            <?php }
        } ?>
</section>
<!-- Affiche le contenue de la page accueil -->


<h2>Nos articles</h2>

<?php 



wp_reset_query();
if(is_front_page()) $paged=(get_query_var('paged'))?get_query_var('paged'):(get_query_var('page'))?get_query_var('page'):1;
else $paged=(get_query_var('paged'))?get_query_var('paged'):1;
query_posts(array('showposts'=>get_option('posts_per_page'),'paged'=>$paged));

?>
<section id="sec_art">

    <?php  if (have_posts()){ ?>
            <?php  while(have_posts()){
                the_post();
                ?><div class="art">
                <?php the_post_thumbnail( 'medium',array( 'class' => 'img-responsive aligncenter'));?>
                  <div id="contenue">
                       <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
                        <?php the_excerpt(); ?>
                  </div>
                </div>  
           <?php }     
                
       
    }
  

?>

</section>   
<!-- Affiche 120 articles -->



<?php get_footer(); ?>