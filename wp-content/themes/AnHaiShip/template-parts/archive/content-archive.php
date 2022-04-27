
<?php
	$colors = array('blue', 'green', 'yellow', 'red');
	$color = $colors[rand(0, count($colors) - 1)];
?>

<article class="postcard light <?php echo $color; ?>">
	<div class=""><?php $color; ?></div>
	<a class="postcard__img_link" href="<?php the_permalink(); ?>">
		<img class="postcard__img" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
	</a>
	<div class="postcard__text t-dark">
		<h1 class="postcard__title <?php echo $color; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="postcard__subtitle small">
			<time datetime="2022-04-25 12:00:00">
				<i class="bi bi-calendar-date"></i> <?php the_date(); ?>
			</time>
		</div>
		<div class="postcard__bar"></div>
		<div class="postcard__preview-txt"><?php the_excerpt(); ?></div>
		<ul class="postcard__tagbox">
			<li class="tag__item"><i class="bi bi-chat-dots-fill"></i> <?php comments_number(); ?></li>
			<li class="tag__item play <?php echo $color; ?>">
				<a href="<?php the_permalink(); ?>"><i class="bi bi-play-btn-fill"></i> Read more</a>
			</li>
		</ul>
	</div>
</article>
