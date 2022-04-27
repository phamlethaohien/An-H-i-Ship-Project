<?php get_header(); ?>

<main id="main">
  <section id="archive" class="archive light">
    <div class="container py-2">
      <?php
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
          get_template_part( 'template-parts/archive/content', 'archive' );
        }
      }
      ?>
      <div class="text-center">
        <?php
          the_posts_pagination();
        ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
