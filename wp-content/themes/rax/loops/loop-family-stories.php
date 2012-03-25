<?php $args = array( 'post_type' => 'family_stories', 'posts_per_page' => 10) ?>
<?php $my_theme_query = new WP_Query( $args ); 

while ( $my_theme_query->have_posts() ) : $my_theme_query->the_post(); ?>
    <div class="post">
         <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
            <?php if ( has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>
        <div class="entrytext">
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
    </div>
<?php endwhile; ?>