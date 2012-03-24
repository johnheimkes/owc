<?php
define('ASSETS_RELATIVE_PATH', '/assets/');
define('ASSETS_DIR', get_template_directory_uri() . ASSETS_RELATIVE_PATH);
include 'static/Site.php';

Site::init();