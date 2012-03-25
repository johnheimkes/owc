<?php
/*
Template Name: Links
*/

get_header();
?>
<ul class="links-list"> 
    <?php wp_list_bookmarks(); ?>
</ul>
<?php
get_sidebar();

get_footer();
?>