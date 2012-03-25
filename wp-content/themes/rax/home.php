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

<ul class="footer-tiles">
    <li>
        <a href="#" class="footer-tile tile-1">
            <div class="footer-tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                About Us
            </div>
            <p class="footer-tile-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <a href="#">More</a>
            </p>
        </a>
        <a href="#" class="footer-tile tile-2">
            <div class="footer-tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                About Us
            </div>
            <p class="footer-tile-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <a href="#">More</a>
            </p>
        </a>
        <a href="#" class="footer-tile tile-3">
            <div class="footer-tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                About Us
            </div>
            <p class="footer-tile-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <a href="#">More</a>
            </p>
        </a>
        <a href="#" class="footer-tile tile-1">
            <div class="footer-tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                About Us
            </div>
            <p class="footer-tile-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <a href="#">More</a>
            </p>
        </a>
    </li>
</ul>

<?php get_footer(); ?>

