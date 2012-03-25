<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php query_posts('post_type=homepage_slider'); ?>

<div class="homepage-sliders">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="homepage-slider">
    <div class="thumb"><?php the_post_thumbnail(); ?></div>
    <div class="text"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
</div>

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
