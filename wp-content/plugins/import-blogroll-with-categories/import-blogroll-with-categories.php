<?php
/*
Plugin Name: Import Blogroll With Categories
Plugin URI: http://wordpress.org/extend/plugins/import-blogroll-with-categories/
Description: Import links/blogroll in OPML format and allow them to be inserted into their proper link categories. 
Version: 1.0
Author: Alan Whipple
Author URI: 
*/

/*  Copyright 2009  Alan Whipple  (email: lordalan@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$add_import_link_to_links_menu = true; // Set this to 'false' if you don't want to add 'Import' to the Links sub-menu
$add_export_link_to_links_menu = true; // Set this to 'false' if you don't want to add 'Export' to the Links sub-menu



function set_bwc_opml(){
	register_importer('bwc_opml', __('Blogroll With Categories'), __('Import links in OPML format into their proper <strong>link categories</strong>.'), array(&$opml_importer, 'dispatch'));
	if (isset($_GET['import']) && $_GET['import']=='bwc_opml' ) {
		//include(ABSPATH . "wp-content/mu-plugins/import-blogroll-with-categories/bwc_opml.php");
		include('bwc_opml.php');
	}
}
add_action('admin_init','set_bwc_opml');



function bwc_redirect_import(){
	if ( strpos($_SERVER['REQUEST_URI'], "link-manager.php?page=import.php") ){
		wp_redirect("admin.php?import=bwc_opml");
	}
}
add_action('admin_init','bwc_redirect_import');



function bwc_add_redirect_import(){
	add_links_page('Import with categories', 'Import', 8, 'import.php', 'bwc_redirect_import');
	//add_links_page('Import with categories', 'Import', 8, 'admin.php?import=bwc_opml', ''); // Doesn't highlight "Import" in Links sub-menu
}
if ($add_import_link_to_links_menu) add_action('admin_menu', 'bwc_add_redirect_import');



function bwc_add_link_to_export(){
	add_links_page('Export Links', 'Export', 8, '../wp-links-opml.php', ''); // add a link straight to the export OPML file
}
if ($add_export_link_to_links_menu) add_action('admin_menu', 'bwc_add_link_to_export');




?>