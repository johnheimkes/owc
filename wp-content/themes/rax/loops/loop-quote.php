<?php $args = array( 'post_type' => 'windmill_quotes', 'posts_per_page' => 1, 'category_name' => 'homepage') ?>
<?php $my_quote_query = new WP_Query( $args );  ?>

<?php while ( $my_quote_query->have_posts() ) : $my_quote_query->the_post(); ?>
    <blockquote>
        <?php echo strip_html_tags(get_the_content()); ?>
    </blockquote>
<?php endwhile; ?>
