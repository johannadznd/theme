<?php get_header(); ?>
<h2><?php the_title(); ?></h2>

<section class="left">
<?php if(!empty($post->post_toc)) {?><?php echo $post->post_toc; ?><?php } ?>
<div id="breadcrumbs"><?php get_breadcrumb(); ?></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <?php  if (have_posts()){ ?>
        <?php  while( have_posts()){
            the_post();?>
                <div id="single">
                <p style="text-align: center;"><?php echo jd_give_me_meta(esc_attr( get_the_date( 'c') ), esc_html( get_the_date()), get_the_category_list(', ')); ?></p>
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

