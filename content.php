<div class="art">
    <?php the_post_thumbnail( 'medium',array( 'class' => 'img-responsive aligncenter'));?>
    <div id="contenue">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
        <p><?php echo lgmac_give_me_meta(esc_attr( get_the_date( 'c') ), esc_html( get_the_date()), get_the_category_list(', ')); ?></p>
        <?php the_excerpt(); ?>
    </div>
</div>

