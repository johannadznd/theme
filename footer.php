
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

<?php
wp_footer();
if (isset($_SESSION['contact-result']) && !is_page('contact')){
    unset($_SESSION['contact-result']);
}
?>

</body>
</html>