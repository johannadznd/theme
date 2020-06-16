<?php get_header(); ?>

<section>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php  while( have_posts()){
                the_post();  
                $date =sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>',
                    esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date())
                    );?>

                
                <div class="row">
                    <div class="col-xs-12">
                        <h2><?php the_title(); ?></h2>
                        <p>Publier le <?php echo $date?>, dans la catégorie <?php the_category(', '); ?></p>
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php } ?> 
            
            <div class="row">
                <div col-xs-12>
                    <nav>
                        <ul class="machin-pager">
                            <li ><?php previous_post_link(); ?></li>
                            <li ><?php next_post_link(); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
        
      
    <?php }
    else{
        echo 'pas de résultats';
    }?>
        </div>
</section>   

<?php get_footer(); ?>

