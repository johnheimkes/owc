<?php query_posts('post_type=family_stories&posts_per_page=10'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="post">
     <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
        <?php if ( has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
    <div class="entrytext">
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    </div>
</div>
<?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>