 <section id="article" class="article">
    <div class="container">
	  <div class="row mx-auto">
	    <div class="col-md-9"> 
		    <div class="gazette-welcome-post">
              <h1><?php the_title(); ?></h1>
              <h5> Publish: <?php the_date(); ?></h5>
			  <span><i class="bi bi-tag"></i> Tags:<?php the_tags('<span><i class="bi bi-tag"></i>', '</span><span><i class="bi bi-tag"></i>', '</span>'); ?></span>
              <!-- Post Thumbnail -->
              <div class="blog-post-thumbnail">
                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
              </div>
                <!-- Post Excerpt -->
              <p>
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
              <div class="dont-miss-post-thumb">
                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
              </div>
              <div class="dont-miss-post-content ml-5">
                <a href="#" class="font-pt">EU council reunites</a>
                <span>Nov 29, 2017</span>
              </div>
            </div> 
          </div>
		</div>    
	  </div>
	</div>
	<?//php comments_number(); ?>
	<?//php comments_template(); ?>
 </section>
   