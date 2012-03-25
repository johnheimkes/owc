<?php
/*
Template Name: Page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post">
  <h2  class="page_header" id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
  <div class="entrytext">
   <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
  </div>
 </div>
 <?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>