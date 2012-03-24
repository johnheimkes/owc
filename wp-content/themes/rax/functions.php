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
				'singular_name' => __( 'Homepage Slide' )
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

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}



Site::init();

