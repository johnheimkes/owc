<?php $args = array( 'post_type' => 'windmill_quotes', 'posts_per_page' => 1, 'category_name' => 'homepage') ?>
<?php $my_theme_query = new WP_Query( $args );  ?>

<?php while ( $my_theme_query->have_posts() ) : $my_theme_query->the_post(); ?>
    <blockquote>
        <?php echo strip_html_tags(get_the_content()); ?>
    </blockquote>
<?php endwhile; ?>
