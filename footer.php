<?php 
        
    global $wp_query;
    $big = 999999999;
    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){?>
        <div id="pagination">
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


<footer>
    <?php 
        if(is_active_sidebar('widgetized-footer')){
            dynamic_sidebar('widgetized-footer');
        }
        else{
           ?> <h4 style="text-align: center; padding-top:2vw">Footer plus tard</h4>
        <?php }
    ?>
</footer>

<?php wp_footer(); 

if (isset($_SESSION['contact-result']) && !is_page('contact')){
    unset($_SESSION['contact-result']);
}
?>

</body>
</html>