<?php get_header(); ?>
<div class="container">
    <div class="jumbotron">
        <h1>Hello</h1>
    </div>
</div>
<section>
    <?php  
        if (have_posts()){ ?>
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

    <div style="margin: 2vw;" class="row">
        <?php 
        
        global $wp_query;
        $big = 999999999;
        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1){?>
            <div class="col-xs-12 lgmacpagination">
                <?php 
                    echo paginate_links(array(
                        'base'      => str_replace($big,'%#%', esc_url( get_pagenum_link ( $big )) ),
                        'format'    => '/page/%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $total_pages,
                        'prev_next' => true,
                        'prev_text' => '« Page précédente',
                        'next_text' => 'Page suivante »'
                    )); 
                ?>
            </div>
    </div>
   <?php }
    ?>



</section>


<?php get_footer(); ?>

