<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post">
  <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
  <div class="entrytext">
   <?php the_content(); ?>
  </div>
 </div>
 
 <?php endwhile; endif; ?>
<?php query_posts('category_name=homepage&showposts=1'); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="quote">
		<h3><?php the_title();?></h3>
		<?php the_content();?>
	</div>
  <?php endwhile;?>
 
 <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

<?php get_footer(); ?>

