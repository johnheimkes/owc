<?php
define('ASSETS_RELATIVE_PATH', '/assets/');
define('ASSETS_DIR', get_template_directory_uri() . ASSETS_RELATIVE_PATH);
include 'static/Site.php';

if ( function_exists ('register_sidebar')) { 
    register_sidebar(); 
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'homepage-carousel', 513, 345 );
    add_image_size( 'homepage-buckets', 220, 120 );
    add_image_size( 'events-sidebar', 58, 58 );
    add_image_size( 'events-listing', 150, 150 );
    add_image_size( 'events-stories-single', 320, 200 );
    add_image_size( 'page-image', 340, 200 );
    add_image_size( 'stories-listing', 145, 95 );
}

 


add_action('init', 'add_excerpt_to_pages');
function add_excerpt_to_pages()
{
    add_post_type_support( 'page', 'excerpt' );
}

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
                    'editor',
                    'thumbnail',
                    'revisions'
                ),
            'has_archive' => false,
            'rewrite' => array('slug' => 'homepage-slider')
        )
    );
}

add_action( 'init', 'create_faqs' );
function create_faqs() {
    register_post_type( 'faqs',
        array(
            'labels' => array(
                'name' => __( 'FAQs' ),
                'singular_name' => __( 'FAQs' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New FAQ' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit FAQ' ),
                'new_item' => __( 'New FAQ' ),
            ),
            'public' => true,
            'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'revisions'
                ),
            'has_archive' => false,
            'rewrite' => array('slug' => 'faqs')
        )
    );
}

add_action( 'init', 'create_quotes' );
function create_quotes() {
    register_post_type( 'windmill_quotes',
        array(
            'labels' => array(
                'name' => __( 'Quotes' ),
                'singular_name' => __( 'Quote' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Quote' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Quote' ),
                'new_item' => __( 'New Quote' ),
            ),
            'public' => true,
            'supports' => array(
                    'title',
                    'excerpt',
                    'editor',
                    'thumbnail',
                    'revisions',
                    'categories'
                ),
            'taxonomies' => array('category', 'post_tag'),
            'has_archive' => false,
            'rewrite' => array('slug' => 'windmill-quotes')
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
            'rewrite' => array('slug' => 'family-stories')
        )
    );
}

function faqs_short( ){
    get_template_part( 'loops/loop', 'faqs' );
}
add_shortcode( 'faqs-list', 'faqs_short' );

function featured_quote( ){
    get_template_part( 'loops/loop', 'faqs' );
}
add_shortcode( 'quote', 'featured_quote' );

function family_stories_short( ){
    get_template_part( 'loops/loop', 'quote' );
}
add_shortcode( 'family-stories', 'family_stories_short' );

function articles_short( ){
    get_template_part( 'loops/loop', 'articles' );
}
add_shortcode( 'articles-list', 'articles_short' );

add_action("admin_menu", "setup_theme_admin_menus");

function setup_theme_admin_menus() {  
    // We will write the function contents very soon.  
    add_submenu_page('themes.php', 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'theme_front_page_settings');
    
    // ($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
}

function theme_front_page_settings() {
    // Check that the user is allowed to update options  
    if (!current_user_can('manage_options')) {  
        wp_die('You do not have sufficient permissions to access this page.');  
    }
    
    $get_contact_email  = get_option("theme_option_email");  
    $get_contact_phone  = get_option("theme_option_phone");
    $get_facebook_prof  = get_option("theme_option_facebook_prof");
    $get_homepage_int   = get_option("theme_option_homepage_int");
    
    ?>
    
    <div class="wrap">  
            <?php screen_icon('themes'); ?> <h2>Windmill Project Theme Options</h2>  

            <form method="POST" action="">
                <fieldset>
                    <input type="hidden" name="update_settings" value="Y" />  
                    <legend class="admin-legend">Contact Info</legend>
                    <p>
                        <label class="admin-label" for="contact_email">Contact Email</label>
                        <input type="text" name="contact_email" id="contact_email" value="<?php echo $get_contact_email; ?>" />
                    </p>
                    <p>
                        <label class="admin-label" for="contact_phone">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" value="<?php echo $get_contact_phone; ?>" />
                    </p>
                </fieldset>
                <fieldset>
                    <legend class="admin-legend">Other Theme Options</legend>
                    <p>
                        <label class="admin-label" for="facebook_profile">Facebook Profile (link)</label>
                        <input type="text" name="facebook_profile" id="facebook_profile" value="<?php echo $get_facebook_prof; ?>" />
                    </p>
                    <p>
                        <label class="admin-label" for="slide_interval">Homepage Slide interval</label>
                        <input type="text" name="slide_interval" id="slide_interval" value="<?php echo $get_homepage_int; ?>" />
                    </p>
                </fieldset>
                <p>  
                    <input type="submit" value="Save settings" class="button-primary"/>  
                </p>
            </form>
        </div>
    
    
    <?php
    if (isset($_POST["update_settings"])) {  
        $contact_email = esc_attr($_POST["contact_email"]);
        $contact_phone = esc_attr($_POST["contact_phone"]);
        $facebook_prof = esc_attr($_POST["facebook_profile"]);
        $homepage_int  = esc_attr($_POST["slide_interval"]);
        
        update_option("theme_option_email", $contact_email);
        update_option("theme_option_phone", $contact_phone);
        update_option("theme_option_facebook_prof", $facebook_prof);
        update_option("theme_option_homepage_int", $homepage_int);
    }
}

function customAdmin() {
    $url = get_settings('siteurl');
    $url = $url . '/wp-content/themes/rax/wp-admin.css';
    echo '<!-- custom admin css -->
          <link rel="stylesheet" type="text/css" href="' . $url . '" />
          <!-- /end custom adming css -->';
}
add_action('admin_head', 'customAdmin');

function homePageExcerpt( $src ) {
    $blank_src = strip_tags($src);
    $new_src = "<p>".$blank_src."  <span class='read-more'>More</span></p>";
    return $new_src;
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
	add_theme_support('menus');
}

Site::init();

