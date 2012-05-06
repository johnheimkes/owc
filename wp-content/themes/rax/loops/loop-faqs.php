<?php $args = array( 'post_type' => 'faqs', 'orderby' => 'title', 'order' => 'ASC' ) ?>
<?php $my_faqs_query = new WP_Query( $args );  ?>

<?php while ( $my_faqs_query->have_posts() ) : $my_faqs_query->the_post(); ?>
<div class="post dropdown-container">
    <h2 id="post-<?php the_ID(); ?>" class="dropdown-title"><?php the_title();?></h2>
    <div class="entrytext dropdown-content">
      <?php the_content(); ?>
    </div>
</div>
<?php endwhile; ?>
