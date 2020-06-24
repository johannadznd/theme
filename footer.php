<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Alsacreations",
    "contactPoint": {
        "@type": "ContactPoint",
        "url": "https://alsacreations.com",
        "email": "contact@alsacreations.com",
        "contactType": "technical support",
        "contactOption": "TollFree"
    }
}
</script>

<footer>
    <?php 
        if(is_active_sidebar('widgetized-footer')){
            dynamic_sidebar('widgetized-footer');
        }
        else{ ?>

        <nav>
           <a href="http://localhost/wordpress/cgu/">CGU</a>
           <a href="http://localhost/wordpress/mentions-legales/">Mentions légales</a>
           <a href="http://localhost/wordpress/plan-html/">Plan HTML</a>
           <a href="http://localhost/wordpress/sitemap_index.xml">Index.XML</a>
        </nav>
          
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