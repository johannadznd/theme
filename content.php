<div class="row">
    <div class="col-xs-2">
        <?php 
            if($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')){
                $thumbnail_src = $thumbnail_html['0']; ?>
                <img class="img-responsive img-thumbnail" src="<?php echo $thumbnail_src; ?>" alt="">
            <?php } ?>
    </div>
    <div class="col-xs-10">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
        <p><?php echo lgmac_give_me_meta(esc_attr( get_the_date( 'c') ), esc_html( get_the_date()), get_the_category_list(', '), get_the_tag_list('',', ')); ?></p>
        <?php the_excerpt(); ?>
    </div>
</div>