<p style="color: white;">.</p>

<?php 
        
        global $wp_query;
        $big = 999999999;
        $total_pages = $wp_query->max_num_pages;
    
        if ($total_pages > 1){?>
            <div id="pagination1">
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
    <?php } ?>
       