
<footer>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Cléatis",
    "contactPoint": {
        "@type": "ContactPoint",
        "url": "https://www.cleatis.fr/",
        "email": "contact@cleatis.fr"
    }
}
</script>

    <?php 
   
        if(is_active_sidebar('widgetized-footer')){
            dynamic_sidebar('widgetized-footer');
        }
        else{ ?>

            
            <div id="desc">
                <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sed, itaque voluptatum quod provident quos. Qui sunt dolor voluptatum, et ducimus repellendus quae recusandae magni expedita esse vitae rem ullam. </p>
                <a href="#">test</a>
            </div>

            <div>
                <nav>
                    <a href="http://localhost/wordpress/cgu/">CGU</a>
                    <a href="http://localhost/wordpress/mentions-legales/">Mentions légales</a>
                    <a href="http://localhost/wordpress/plan-html/">Plan HTML</a>
                    <a href="http://localhost/wordpress/sitemap_index.xml">Index.XML</a>
                </nav>
            </div>
            
        
          
          <?php  }
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