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

<ul class="tiles">
    <li>
        <a href="#" class="tile tile-1">
            <div class="tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                <span class="tile-label">About Us</span>
            </div>
            <p class="tile-body">
                Lorem ipsum dolor sit amet, consectetur kitties adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <span class="inner-link">More</span>
            </p>
        </a>
    </li>
    <li>
        <a href="#" class="tile tile-2">
            <div class="tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                <span class="tile-label">About Us</span>
            </div>
            <p class="tile-body">
                Lorem ipsum dolor sit amet, consectetur kitties adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <span class="inner-link">More</span>
            </p>
        </a>
    </li>
    <li>
        <a href="#" class="tile tile-3">
            <div class="tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                <span class="tile-label">About Us</span>
            </div>
            <p class="tile-body">
                Lorem ipsum dolor sit amet, consectetur kitties adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <span class="inner-link">More</span>
            </p>
        </a>
    </li>
    <li>
        <a href="#" class="tile tile-1">
            <div class="tile-header">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2012/03/287-150x150.jpg" alt="" />
                <span class="tile-label">About Us</span>
            </div>
            <p class="tile-body">
                Lorem ipsum dolor sit amet, consectetur kitties adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <span class="inner-link">More</span>
            </p>
        </a>
    </li>
</ul>
