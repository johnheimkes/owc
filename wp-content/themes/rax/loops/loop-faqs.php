<?php $args = array( 'post_type' => 'faqs', 'posts_per_page' => 10 ) ?>
<?php $my_theme_query = new WP_Query( $args );  ?>

<?php while ( $my_theme_query->have_posts() ) : $my_theme_query->the_post(); ?>
<div class="post">
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
    <div class="entrytext">
      <?php the_content(); ?>
    </div>
</div>
<?php endwhile; ?>
