<section id="article" class="article">
	<div class="container" data-aos="fade-up">  
    Publish: <?php the_date(); ?>
    Tags: <?php the_tags('<span><i class="bi bi-tag"></i>', '</span><span><i class="bi bi-tag"></i>', '</span>'); ?>
    <?php the_content(); ?>

		Comments: <?php comments_number(); ?>
		<?php comments_template(); ?>
	</div>
</section>