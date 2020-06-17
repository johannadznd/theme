<?php get_header(); 

$args_blog = array(
    'post_type' => 'post',
    'posts_per_page' => 120
);

$req_blog = new WP_Query($args_blog);

?>
<section>

    <?php  if ($req_blog->have_posts()){ ?>
        <div class="container">
            <?php  while($req_blog->have_posts()){
                $req_blog->the_post();?>
                <h2><?php the_title()?></h2>
                <?php
                the_post_thumbnail( 'medium',array( 'class' => 'img-responsive aligncenter'));
                the_excerpt();
                echo lgmac_give_me_meta(
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date()),
                    get_the_category_list( ', '),
                    get_the_tag_list('',', ')
                );
            } ?>     
        </div>
      
    <?php }
    else{
        echo 'pas de résultats';
    }  
    ?>  
</section>   

<section>
    <div class="container">
        <?php if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php 
                            the_title('<h1 class=>','</h1>');
                            the_content();
                        ?>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</section>

<?php get_footer(); ?>