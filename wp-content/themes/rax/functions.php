<?php
define('ASSETS_RELATIVE_PATH', '/assets/');
define('ASSETS_DIR', get_template_directory_uri() . ASSETS_RELATIVE_PATH);
include 'static/Site.php';

add_action( 'init', 'create_homepage_sliders' );
function create_homepage_sliders() {
    register_post_type( 'homepage_slider',
        array(
            'labels' => array(
                'name' => __( 'Homepage Slides' ),
                'singular_name' => __( 'Homepage Slide' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Homepage Slide' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Homepage Slide' ),
                'new_item' => __( 'New Homepage Slide' ),
            ),
            'public' => true,
            'supports' => array(
                    'title',
                    'author',
                    'excerpt',
                    'editor',
                    'thumbnail',
                    'revisions'
                ),
            'has_archive' => false,
            'rewrite' => array('slug' => 'homepage_slider')
        )
    );
}

add_action( 'init', 'create_family_stories' );
function create_family_stories() {
    register_post_type( 'family_stories',
        array(
            'labels' => array(
                'name' => __( 'Family Stories' ),
                'singular_name' => __( 'Family Story' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Family Story' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Family Story' ),
                'new_item' => __( 'New Family Story' ),
            ),
            'public' => true,
            'supports' => array(
                    'title',
                    'author',
                    'excerpt',
                    'editor',
                    'thumbnail',
                    'revisions'
                ),
            'has_archive' => false,
            'rewrite' => array('slug' => 'family_stories')
        )
    );
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
	add_theme_support( 'menus' );
}

Site::init();

