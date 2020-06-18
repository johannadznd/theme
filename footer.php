<footer>
    <?php 
        if(is_active_sidebar('widgetized-footer')){
            dynamic_sidebar('widgetized-footer');
        }
        else{
            echo "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui dolor praesentium aspernatur, obcaecati esse autem officiis assumenda quis. Eos doloremque molestias dolor doloribus ad officiis repellat sint aliquid earum deleniti?";
        }
    ?>
</footer>

<?php wp_footer(); 

if (isset($_SESSION['contact-result']) && !is_page('contact')){
    unset($_SESSION['contact-result']);
}
?>

</body>
</html>