<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-page-content">
            <?php
            the_content();
            AnHaiShipWebsite_link_page();
            ?>
        </div>
    <?php
        AnHaiShipWebsite_comment_form();
    endwhile;
    ?>
</div>