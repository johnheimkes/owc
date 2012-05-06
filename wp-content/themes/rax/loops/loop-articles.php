<?php $args = array( 'post_type' => 'article', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC') ?>
<?php $my_articles_query = new WP_Query( $args );  ?>

<?php while ( $my_articles_query->have_posts() ) : $my_articles_query->the_post(); ?>
<div class="post">
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
</div>
<?php endwhile; ?>
