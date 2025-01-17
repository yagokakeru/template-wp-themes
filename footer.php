       
<a class="footer_nav_page" href="<?php echo home_url(); ?>">TOP</a>
<a class="footer_nav_page" href="<?php echo get_page_link( 12 ); ?>">私たちの特徴</a>
<picture>
    <source srcset="<?php echo get_stylesheet_directory_uri() ?>/assets/images/common/techblog_banner.webp" type="image/webp">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/common/techblog_banner.jpg" alt="技術ブログ" width="939" height="260" loading="lazy">
</picture>

<?php wp_footer(); ?>

</body>
</html>