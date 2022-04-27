<?php get_header(); ?>

<main id="main">
  <section id="article" class="article">
   <?php
   if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      get_template_part( 'template-parts/article/content', 'article' );
    }
  }
  ?>
  <div class="text-left">
        <?php
          the_posts_pagination();
        ?>
  </div>
  </section>

</main>

<?php get_footer(); ?>
