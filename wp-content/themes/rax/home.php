<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php query_posts('post_type=homepage_slider&showposts=3'); ?>

<div class="carousel" id="js-featured-carousel">
    <?php $ct=0; if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="slide<?php echo $ct == 0 ? ' active' : ''; ?>">
        <div class="slide-image"><?php the_post_thumbnail('homepage-carousel'); ?></div>
        <div class="slide-content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php $ct++; endwhile; endif; ?>
</div>
<div class="carousel-nav">
    <ul>
        <?php for($i=0;$i<$ct;$i++): ?>
        <li class="nav">
            <a href="#">&#10625;</a>
        </li>
        <?php endfor; ?>
    </ul>
</div>

<ul class="tiles">
    <?php $idx=1; foreach(array('about-us', 'events', 'stories', 'contact-us') as $name): ?>
    <?php rewind_posts(); ?>
    <?php query_posts(array('name' => $name, 'show_posts' => 1, 'post_type' => 'page')); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li>
            <a href="<?php echo site_url(); ?>" class="tile tile-<?php echo $idx; ?>">
                <div class="tile-header">
                    <?php the_post_thumbnail('homepage-buckets'); ?>
                    <span class="tile-label"><?php the_title(); ?></span>
                </div>
                <div class="tile-body">
                    <?php 
                    $excerpt = get_the_excerpt();
                    echo homePageExcerpt($excerpt); ?>
                </div>
            </a>
        </li>
    <?php $idx = ($idx % 3) + 1; endwhile; endif; ?>
    <?php endforeach; ?>
</ul>

<?php get_footer(); ?>