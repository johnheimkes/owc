<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <title><?php
    	/*
    	 * Print the <title> tag based on what is being viewed.
    	 */
    	global $page, $paged;

    	wp_title( '|', true, 'right' );

    	// Add the blog name.
    	bloginfo( 'name' );

    	// Add the blog description for the home/front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	if ( $site_description && ( is_home() || is_front_page() ) )
    		echo " | $site_description";

    	// Add a page number if necessary:
    	if ( $paged >= 2 || $page >= 2 )
    		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

    	?></title>
    <script>
        var baseURL       = '<?php echo site_url(); ?>/';
        var ajaxURL       = '<?php echo admin_url(); ?>admin-ajax.php?action=';
        var assetsURL     = '<?php echo ASSETS_DIR; ?>';
        var sliderTimeout = <?php echo (int)get_option('theme_option_homepage_int'); ?>;
    </script>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]> <script src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/scripts/html5.js" type="text/javascript"></script> <![endif]-->
    <?php wp_head(); ?>
    <script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/scripts/respond.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/scripts/global.js"></script>
</head>
<body>
<div id="main-wrapper">
    <section id="header-wrapper group">
        <header id="site-header" class="group">
            <h1 class="logo"><a href="<?php echo site_url('/'); ?>">The Windmill Project</a></h1>
            <div class="supplemental">
                <ul class="promo">
                    <li>Connecting Families</li>
                    <li>Sharing Strengths</li>
                    <li>Renewing Hope</li>
                </ul>
                
                <a class="button donate" href="<?php echo site_url('donate/'); ?>">Donate Now</a>
            </div><!--.supplemental-->
            
            <?php wp_nav_menu( array('menu' => 'Header-Main' )); ?>
            
        </header>
    </section>

    <section id="page-content" class="group">
