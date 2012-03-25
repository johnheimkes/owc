<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="MSSmartTagsPreventParsing" content="true" />
    <meta http-equiv="imagetoolbar" content="no" />
    <title></title>
    <script>
        var baseURL   = '<?php echo site_url(); ?>/';
        var ajaxURL   = '<?php echo admin_url(); ?>admin-ajax.php?action=';
        var assetsURL = '<?php echo ASSETS_DIR; ?>';
    </script>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
    <script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/scripts/respond.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/scripts/global.js"></script>
</head>
<body>
<div id="main-wrapper">
    <section id="header-wrapper group">
        <header id="site-header">
            <h1 class="logo"><a href="<?php echo site_url('/') ?>">The Windmill Project</a></h1>
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

    <section id="page-content">
