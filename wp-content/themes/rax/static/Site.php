<?php

/**
 * Contains initialization information for the site.
 */
class Site
{
    protected static $_instance;

    public static function init() {
        // Only initialize if we haven't already
        if (isset(self::$_instance)) {
            return;
        }

        $instance = new Site();

        // Register tha autoload method
        spl_autoload_register(array(&$instance, '__autoload'));

        add_action(
            'wp_print_scripts',
            array(&$instance, 'enqueueScripts')
        );
        add_action('wp_print_styles', array(&$instance, 'enqueueStyles'));
        add_action(
            'wp_head', array(&$instance, 'printConditionalStylesheets'), 99
        );

        self::$_instance = $instance;
    }

    public function enqueueScripts()
    {
        if (!is_admin()) {
            // Register / Enqueue scripts here
            wp_enqueue_script(
                'jquery'
            );
        }
    }

    public function enqueueStyles()
    {
        if (!is_admin()) {
            // Register stylesheets
            /*
             * Example:
             * wp_enqueue_style('header', ASSETS_DIR . 'styles/header.css');
             *
             */
        }
    }

    public function printConditionalStylesheets()
    {
        global $wp_styles;

        // Register / Print IE styles here
        /*
         * Example:
         * wp_register_style("style-ie7", ASSETS_DIR . "css/ie7.css");
         * $wp_styles->add_data("style-ie7", 'conditional', "IE 7");
         *
         * wp_print_styles("style-ie7");
         */
    }

    /**
     * Method used to include classes within the theme
     *
     * @param string $className Name of the class to attempt to load
     * @return void
     */
    public function __autoload($className)
    {
        $path = null;
        if (preg_match("/Model$/", $className)) {
            $path = "models/$className.php";
        }

        if (isset($path)) {
            require_once TEMPLATEPATH . "/$path";
        }
    }
}
