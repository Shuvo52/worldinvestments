<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery PageBuilder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$wizors_investments_content = '';
$wizors_investments_blog_archive_mask = '%%CONTENT%%';
$wizors_investments_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $wizors_investments_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($wizors_investments_content = apply_filters('the_content', get_the_content())) != '') {
		if (($wizors_investments_pos = strpos($wizors_investments_content, $wizors_investments_blog_archive_mask)) !== false) {
			$wizors_investments_content = preg_replace('/(\<p\>\s*)?'.$wizors_investments_blog_archive_mask.'(\s*\<\/p\>)/i', $wizors_investments_blog_archive_subst, $wizors_investments_content);
		} else
			$wizors_investments_content .= $wizors_investments_blog_archive_subst;
		$wizors_investments_content = explode($wizors_investments_blog_archive_mask, $wizors_investments_content);
	}
}

// Prepare args for a new query
$wizors_investments_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$wizors_investments_args = wizors_investments_query_add_posts_and_cats($wizors_investments_args, '', wizors_investments_get_theme_option('post_type'), wizors_investments_get_theme_option('parent_cat'));
$wizors_investments_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($wizors_investments_page_number > 1) {
	$wizors_investments_args['paged'] = $wizors_investments_page_number;
	$wizors_investments_args['ignore_sticky_posts'] = true;
}
$wizors_investments_ppp = wizors_investments_get_theme_option('posts_per_page');
if ((int) $wizors_investments_ppp != 0)
	$wizors_investments_args['posts_per_page'] = (int) $wizors_investments_ppp;
// Make a new query
query_posts( $wizors_investments_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($wizors_investments_content) && count($wizors_investments_content) == 2) {
	set_query_var('blog_archive_start', $wizors_investments_content[0]);
	set_query_var('blog_archive_end', $wizors_investments_content[1]);
}

get_template_part('index');
?>