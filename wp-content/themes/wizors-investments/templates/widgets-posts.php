<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_post_id    = get_the_ID();
$wizors_investments_post_date  = wizors_investments_get_date();
$wizors_investments_post_title = get_the_title();
$wizors_investments_post_link  = get_permalink();
$wizors_investments_post_author_id   = get_the_author_meta('ID');
$wizors_investments_post_author_name = get_the_author_meta('display_name');
$wizors_investments_post_author_url  = get_author_posts_url($wizors_investments_post_author_id, '');

$wizors_investments_args = get_query_var('wizors_investments_args_widgets_posts');
$wizors_investments_show_date = isset($wizors_investments_args['show_date']) ? (int) $wizors_investments_args['show_date'] : 1;
$wizors_investments_show_image = isset($wizors_investments_args['show_image']) ? (int) $wizors_investments_args['show_image'] : 1;
$wizors_investments_show_author = isset($wizors_investments_args['show_author']) ? (int) $wizors_investments_args['show_author'] : 1;
$wizors_investments_show_counters = isset($wizors_investments_args['show_counters']) ? (int) $wizors_investments_args['show_counters'] : 1;
$wizors_investments_show_categories = isset($wizors_investments_args['show_categories']) ? (int) $wizors_investments_args['show_categories'] : 1;

$wizors_investments_output = wizors_investments_storage_get('wizors_investments_output_widgets_posts');

$wizors_investments_post_counters_output = '';
if ( $wizors_investments_show_counters ) {
	$wizors_investments_post_counters_output = '<span class="post_info_item post_info_counters">'
								. wizors_investments_get_post_counters('comments')
							. '</span>';
}


$wizors_investments_output .= '<article class="post_item with_thumb">';

if ($wizors_investments_show_image) {
	$wizors_investments_post_thumb = get_the_post_thumbnail($wizors_investments_post_id, wizors_investments_get_thumb_size('tiny'), array(
		'alt' => the_title_attribute( array( 'echo' => false ) )
	));
	if ($wizors_investments_post_thumb) $wizors_investments_output .= '<div class="post_thumb">' . ($wizors_investments_post_link ? '<a href="' . esc_url($wizors_investments_post_link) . '">' : '') . ($wizors_investments_post_thumb) . ($wizors_investments_post_link ? '</a>' : '') . '</div>';
}

$wizors_investments_output .= '<div class="post_content">'
			. ($wizors_investments_show_categories 
					? '<div class="post_categories">'
						. wizors_investments_get_post_categories()
						. $wizors_investments_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($wizors_investments_post_link ? '<a href="' . esc_url($wizors_investments_post_link) . '">' : '') . ($wizors_investments_post_title) . ($wizors_investments_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('wizors_investments_filter_get_post_info', 
								'<div class="post_info">'
									. ($wizors_investments_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($wizors_investments_post_link ? '<a href="' . esc_url($wizors_investments_post_link) . '" class="post_info_date">' : '') 
											. esc_html($wizors_investments_post_date) 
											. ($wizors_investments_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($wizors_investments_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'wizors-investments') . ' ' 
											. ($wizors_investments_post_link ? '<a href="' . esc_url($wizors_investments_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($wizors_investments_post_author_name) 
											. ($wizors_investments_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$wizors_investments_show_categories && $wizors_investments_post_counters_output
										? $wizors_investments_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
wizors_investments_storage_set('wizors_investments_output_widgets_posts', $wizors_investments_output);
?>