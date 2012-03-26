<?php
/**
 * This is a modification of the core WordPress file located at:
 * /wp-admin/import/opml.php
 * from the 2.7 distribution
**/

/** Load WordPress Administration Bootstrap */
$parent_file = 'tools.php';
$submenu_file = 'import.php';
$title = __('Import Blogroll');


class OPML_Import_bwc {

	function dispatch() {
		global $wpdb, $user_ID;
$step = $_POST['step'];
if (!$step) $step = 0;
?>
<?php
switch ($step) {
	case 0: {
		include_once('admin-header.php');
		if ( !current_user_can('manage_links') )
			wp_die(__('Cheatin&#8217; uh?'));

		$opmltype = 'blogrolling'; // default.
?>


<div class="wrap">
<?php screen_icon(); ?>
<h2><?php _e('Import your categorized blogroll from another system') ?> </h2>
<form enctype="multipart/form-data" action="admin.php?import=bwc_opml" method="post" name="blogroll">
<?php wp_nonce_field('import-bookmarks') ?>

<p><?php _e('If a program or website you use allows you to export your links or subscriptions as OPML you may import them here.'); ?></p>
<div style="width: 70%; margin: auto; height: 8em;">
<input type="hidden" name="step" value="1" />
<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
<div style="width: 48%;" class="alignleft">
<h3><label for="opml_url"><?php _e('Specify an OPML URL:'); ?></label></h3>
<input type="text" name="opml_url" id="opml_url" size="50" style="width: 90%;" value="http://" />
</div>

<div style="width: 48%;" class="alignleft">
<h3><label for="userfile"><?php _e('Or choose from your local disk:'); ?></label></h3>
<input id="userfile" name="userfile" type="file" size="30" />
</div>

</div>

<p style="clear: both; margin-top: 1em;">
<input name="create_or_default" id="create_or_default1" type="radio" value="create" checked="checked" /> <label for="create_or_default1"><?php _e('Create new link categories as necessary.') ?></label>
</p>

<p style="margin-top: 1em;">
<input name="create_or_default" id="create_or_default2" type="radio" value="default" />
<label for="cat_id"><?php _e('Don\'t create new link categories. If a matching category is not found, the link will go into category: ') ?></label> 
<select name="cat_id" id="cat_id">
<?php
$categories = get_terms('link_category', 'get=all');
foreach ($categories as $category) {
?>
<option value="<?php echo $category->term_id; ?>"><?php echo wp_specialchars(apply_filters('link_category', $category->name)); ?>&nbsp;</option>
<?php
} // end foreach
?>
</select>


</p>

<p class="submit"><input type="submit" name="submit" value="<?php _e('Import OPML File') ?>" /></p>
</form>

</div>
<?php
		break;
	} // end case 0

	case 1: {
		check_admin_referer('import-bookmarks');

		include_once('admin-header.php');
		if ( !current_user_can('manage_links') )
			wp_die(__('Cheatin&#8217; uh?'));
?>

<style type="text/css">
h3{
	font-size:22px;
	margin-bottom:0;
	margin-top:20px;
}
.bwc_warning{
	color:#c00;
}
</style>

<div class="wrap">

<h2><?php _e('Importing...') ?></h2>
<?php
		$cat_id = abs( (int) $_POST['cat_id'] );
		if ( $cat_id < 1 ){
			$cat_id = 1;
		}
		$cat_name_default = get_term($cat_id, 'link_category');
		

		$opml_url = $_POST['opml_url'];
		if ( isset($opml_url) && $opml_url != '' && $opml_url != 'http://' ) {
			$blogrolling = true;
		} else { // try to get the upload file.
			$overrides = array('test_form' => false, 'test_type' => false);
			$file = wp_handle_upload($_FILES['userfile'], $overrides);

			if ( isset($file['error']) )
				wp_die($file['error']);

			$url = $file['url'];
			$opml_url = $file['file'];
			$blogrolling = false;
		}

		global $opml, $updated_timestamp, $all_links, $map, $names, $urls, $targets, $descriptions, $feeds;
		if ( isset($opml_url) && $opml_url != '' ) {
			if ( $blogrolling === true ) {
				$opml = wp_remote_fopen($opml_url);
			} else {
				$opml = file_get_contents($opml_url);
			}

			/** Load OPML Parser */
			include_once('link-parse-opml.php');
			
			$categories = get_terms('link_category', 'get=all');
			if ( $categories ) {
				foreach ( $categories as $category ) {
					$categories2[$category->name] = $category->term_id;
				}
			}
			$categories_nc = array_change_key_case($categories2, CASE_LOWER); // Case-insensitive
			$link_count = count($names);
			$link_count_real = $link_count;
			for ( $i = 0; $i < $link_count; $i++ ) {
				if ($urls[$i]==''){ // if OPML item appears to be a category name
					$link_count_real--;
					$link_cat=htmlspecialchars($names[$i]);
					$link_cat_nc = strtolower($link_cat);
					echo "<h3>$link_cat </h3>";
					if ( array_key_exists($link_cat_nc,$categories_nc) ){ // If the category already exists, no problem! 
						$cat_id = abs( (int)$categories_nc[$link_cat_nc]);
					}else{
						if ( $_POST['create_or_default']=='create' ){ // If the category doesn't exist, make it
							$cat_id = wp_insert_term( $link_cat, 'link_category' ); 
							$cat_id = abs( (int) $cat_id['term_id'] );
							$cat_name_new = get_term($cat_id, 'link_category');
							echo "<span class=\"bwc_warning\">(Link Category '$cat_name_new->name' was created.)</span>";
						} else { // If the category doesn't exist, use the default category selected
							echo "<span class=\"bwc_warning\">(Link Category doesn't exist. Inserting links into '$cat_name_default->name')</span>";
						}
					}
					echo "<hr/>";
				}else{ // if OPML item appears to be normal link)
					if ('Last' == substr($titles[$i], 0, 4))
						$titles[$i] = '';
					if ( 'http' == substr($titles[$i], 0, 4) )
						$titles[$i] = '';
					$link = array( 'link_url' => $urls[$i], 'link_name' => $wpdb->escape($names[$i]), 'link_category' => array($cat_id), 'link_description' => $wpdb->escape($descriptions[$i]), 'link_owner' => $user_ID, 'link_rss' => $feeds[$i]);
					wp_insert_link($link);
					echo sprintf('<p>'.__('Inserted <strong>%s</strong>').'</p>', $names[$i]);
				}
			}
?>

<p><?php printf(__('%1$d links were imported. All done! Go <a href="%2$s">manage those links</a>.'), $link_count_real, 'link-manager.php'); ?></p>

<?php
} // end if got url
else
{
	echo "<p>" . __("You need to supply your OPML url. Press back on your browser and try again") . "</p>\n";
} // end else

if ( ! $blogrolling )
	do_action( 'wp_delete_file', $opml_url);
	@unlink($opml_url);
?>
</div>
<?php
		break;
	} // end case 1
} // end switch
	}

	function OPML_Import_bwc() {}
}

$opml_importer = new OPML_Import_bwc();

// Registering the importer is done by the main plugin file.

?>
