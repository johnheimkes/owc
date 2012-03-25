<?php $args = array( 'post_type' => 'quote', 'posts_per_page' => 1) ?>
<?php $my_theme_query = new WP_Query( $args );  ?>

<?php while ( $my_theme_query->have_posts() ) : $my_theme_query->the_post(); ?>
    <blockquote>
        <?php the_content(); ?>
    </blockquote>
<?php endwhile; ?>
