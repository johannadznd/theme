<?php get_header(); ?>

<section>

    <?php  if (have_posts()){ ?>
        <div class="container">
            <?php  while( have_posts()){
                the_post();?>
                <div class="row">
                    <div class="col-xs-12">
                        <h2><?php the_title(); ?></h2>
                        <p>
                        <?php echo lgmac_give_me_meta(esc_attr( get_the_date( 'c') ), esc_html( get_the_date()), get_the_category_list(', '), get_the_tag_list('',', ')); ?>
                        </p>
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
        </div>    
    <?php }
    else{
        echo 'pas de résultats';
    }?>
        
</section>   

<?php get_footer(); ?>

