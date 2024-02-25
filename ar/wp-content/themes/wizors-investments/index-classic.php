<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

wizors_investments_storage_set('blog_archive', true);

// Load scripts for 'Masonry' layout
if (substr(wizors_investments_get_theme_option('blog_style'), 0, 7) == 'masonry') {
	wp_enqueue_script( 'classie', wizors_investments_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
	wp_enqueue_script( 'imagesloaded', wizors_investments_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
	wp_enqueue_script( 'masonry', wizors_investments_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
	wp_enqueue_script( 'wizors-investments-gallery-script', wizors_investments_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );
}

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$wizors_investments_classes = 'posts_container '
						. (substr(wizors_investments_get_theme_option('blog_style'), 0, 7) == 'classic' ? 'columns_wrap' : 'masonry_wrap');
	$wizors_investments_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$wizors_investments_sticky_out = is_array($wizors_investments_stickies) && count($wizors_investments_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($wizors_investments_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$wizors_investments_sticky_out) {
		if (wizors_investments_get_theme_option('first_post_large') && !is_paged() && !in_array(wizors_investments_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="<?php echo esc_attr($wizors_investments_classes); ?>"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($wizors_investments_sticky_out && !is_sticky()) {
			$wizors_investments_sticky_out = false;
			?></div><div class="<?php echo esc_attr($wizors_investments_classes); ?>"><?php
		}
		get_template_part( 'content', $wizors_investments_sticky_out && is_sticky() ? 'sticky' : 'classic' );
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