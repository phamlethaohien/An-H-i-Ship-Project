<section id="archive" class="archive">
    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="">    
    <h3><?php the_title(); ?></h3>
    <div><?php the_date(); ?></div>
    <div><?php comments_number(); ?></div>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>">Read more</a>
</section>