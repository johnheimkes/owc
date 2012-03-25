<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php query_posts('post_type=homepage_slider'); ?>

<div class="carousel">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="slide">
        <div class="image-wrapper"><?php the_post_thumbnail( array(513,345) ); ?></div>
        <div class="copy-wrapper">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; endif; ?>
</div>

<ul class="tiles">
    <?php $idx=1; foreach(array('about-us', 'events', 'stories', 'contact-us') as $name): ?>
    <?php rewind_posts(); ?>
    <?php query_posts(array('name' => $name, 'show_posts' => 1, 'post_type' => 'page')); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li>
            <a href="<?php echo site_url(); ?>" class="tile tile-<?php echo $idx; ?>">
                <div class="tile-header">
                    <?php the_post_thumbnail(); ?>
                    <span class="tile-label"><?php the_title(); ?></span>
                </div>
                <p class="tile-body">
                    <?php the_excerpt(); ?>
                </p>
            </a>
        </li>
    <?php $idx = ($idx % 3) + 1; endwhile; endif; ?>
    <?php endforeach; ?>
</ul>

<?php get_footer(); ?>