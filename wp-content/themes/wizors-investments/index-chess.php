<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

wizors_investments_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$wizors_investments_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$wizors_investments_sticky_out = is_array($wizors_investments_stickies) && count($wizors_investments_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($wizors_investments_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$wizors_investments_sticky_out) {
		?><div class="chess_wrap posts_container"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($wizors_investments_sticky_out && !is_sticky()) {
			$wizors_investments_sticky_out = false;
			?></div><div class="chess_wrap posts_container"><?php
		}
		get_template_part( 'content', $wizors_investments_sticky_out && is_sticky() ? 'sticky' :'chess' );
	}
	
	?></div><?php

	wizors_investments_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>