<?php $args = array( 'post_type' => 'windmill_quotes', 'posts_per_page' => 1, 'orderby' => 'rand') ?>
<?php $my_quote_query = new WP_Query( $args );  ?>

<?php while ( $my_quote_query->have_posts() ) : $my_quote_query->the_post(); ?>
    <div class="inspirational-quote">
        <?php echo strip_html_tags(get_the_content()); ?>
    </div>
<?php endwhile; ?>