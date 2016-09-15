<aside>
	<div class="menu">
		<h4><span>Меню</span></h4>
		<?php wp_nav_menu(array('theme_location' => 'sidebar-menu') ); ?>
	</div>

	<div class="last-news">
		<?php 
		$args = [
		'post_type' => 'post',
		'posts_per_page' => 1
		];
		query_posts( $args );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h4><span><?php echo __('[:ua]Останні новини[:ru]Последние новости[:]'); ?></span></h4>
		<div class="thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		<div class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</div>
		<div class="post-details">
			<div class="date"><?php echo get_the_date(); ?></div>
			<div class="comments"><a href="<?php the_permalink(); ?>"><?php comments_number(); ?></a></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="link"><!--:ua-->Читати далі<!--:--><!--:ru-->Читать далее<!--:--></a>
	<?php endwhile; 
	endif;
	wp_reset_query(); ?>
</aside>