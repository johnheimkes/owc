<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'category_name' => 'articles') ?>
<?php $my_theme_query = new WP_Query( $args );  ?>

<?php while ( $my_theme_query->have_posts() ) : $my_theme_query->the_post(); ?>
<div class="post">
     <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
        <?php if ( has_post_thumbnail()) {
            the_post_thumbnail();
        } ?>
    <div class="entrytext">
      <?php the_excerpt('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    </div>
</div>
<?php endwhile; ?>
