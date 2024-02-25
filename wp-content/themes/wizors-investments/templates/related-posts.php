<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_link = get_permalink();
$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($wizors_investments_post_format) ); ?>><?php
	wizors_investments_show_post_featured(array(
		'thumb_size' => wizors_investments_get_thumb_size( 'big' ),
		'show_no_image' => true,
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">' . wizors_investments_get_post_categories('') . '</div>'
							. '<h6 class="post_title entry-title"><a href="' . esc_url($wizors_investments_link) . '">' . wp_kses( get_the_title(), 'wizors_investments_kses_content' ) . '</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="' . esc_url($wizors_investments_link) . '">' . wizors_investments_get_date() . '</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>