<section id="article" class="article">
  <div class="container">
	  <div class="row mx-auto">
	    <div class="col-md-9">
		    <div class="gazette-welcome-post">
          <h1><?php the_title(); ?></h1>
          <span><i class="bi bi-clock"></i> Publish: <?php the_date(); ?></span>
          <span class="px-5"><i class="bi bi-tag"></i> Tags:<?php the_tags('<span><i class="bi bi-tag"></i>', '</span><span><i class="bi bi-tag"></i>', '</span>'); ?></span>
          <!-- Post Thumbnail -->
          <div class="blog-post-thumbnail text-center mt-5">
            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
          </div>
          <!-- Post Excerpt -->
          <p class="mt-5">
            <?php the_content(); ?>
          </p>
        </div>
		  </div>
      <div class="col-md-3">
        <div class="donnot-miss-widget">
          <div class="widget-title">
            <h5>Tin tức liên quan:</h5>
          </div>
          <!-- Single Don't Miss Post -->
          <div class="single-dont-miss-post d-flex mb-5">
            <div class="row">
              <?php
                // Define our WP Query Parameters
                $the_query = new WP_Query( 'posts_per_page=5' );
                // Start our WP Query
                while ($the_query -> have_posts()) : $the_query -> the_post();
                // Display the Post Title with Hyperlink
              ?>
                <a href="<?php the_permalink() ?>" class="col-md-12 d-flex mb-3">
                  <div class="dont-miss-post-thumb">
                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                  </div>
                  <div class="dont-miss-post-content ml-5">
                    <div class="font-pt"><?php the_title(); ?></div>
                    <span class="font-weight-bold"><i class="bi bi-clock"></i> <?php the_date(); ?></span>
                    <span>
                      <?php
                        // Display the Post Excerpt
                        the_excerpt(__('(more…)'));
                      ?>
                    </span>
                  </div>
                </a>
              <?php
                // Repeat the process and reset once it hits the limit
                endwhile;
                wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
      </div>
	  </div>
	</div>
	<?//php comments_number(); ?>
	<?//php comments_template(); ?>
 </section>
   