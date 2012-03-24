<?php get_header(); ?>

<?php $my_query = new WP_Query('post_type=page'); ?>

<?php while ($my_query->have_posts()) : $my_query->the_post();
	
		the_title();
		the_content();

endwhile; ?>

<?php get_footer(); ?>