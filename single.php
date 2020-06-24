<?php get_header(); ?>
<h2><?php the_title(); ?></h2>

<section class="left">
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}

?>
    <?php  if (have_posts()){ ?>
        <?php  while( have_posts()){
            the_post();?>
                <div id="single">
                <p><?php echo jd_give_me_meta(esc_attr( get_the_date( 'c') ), esc_html( get_the_date()), get_the_category_list(', ')); ?></p>
                <?php the_content(); ?>  
                </div>       
            <?php } ?> 
            <nav>
                <ul class="pager">
                    <li ><?php previous_post_link(); ?></li>
                    <li ><?php next_post_link(); ?></li>
                </ul>
            </nav>
    <?php }
    else{
        echo 'pas de résultats';
    }?>
        
</section>   

<?php get_template_part('sidebar'); ?>

<?php get_footer(); ?>

