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
</div>
<?php endwhile; endif; ?>
</div>

<ul class="footer-tiles">
    <?php foreach(array('about-us', 'events', 'stories', 'contact-us') as $name): ?>
    <?php rewind_posts(); ?>
    <?php query_posts(array('name' => $name, 'show_posts' => 1, 'post_type' => 'page')); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li>
            <a href="<?php echo site_url(); ?>" class="tile tile-1">
                <div class="tile-header">
                    <?php the_post_thumbnail(); ?>
                    <span class="tile-label"><?php the_title(); ?></span>
                </div>
                <p class="tile-body">
                    <?php the_excerpt(); ?>
                </p>
            </a>
        </li>
    <?php endwhile; endif; ?>
    <?php endforeach; ?>
</ul>