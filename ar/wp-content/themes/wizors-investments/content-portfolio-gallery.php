<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_blog_style = explode('_', wizors_investments_get_theme_option('blog_style'));
$wizors_investments_columns = empty($wizors_investments_blog_style[1]) ? 2 : max(2, $wizors_investments_blog_style[1]);
$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
$wizors_investments_animation = wizors_investments_get_theme_option('blog_animation');
$wizors_investments_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($wizors_investments_columns).' post_format_'.esc_attr($wizors_investments_post_format) ); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($wizors_investments_image[1]) && !empty($wizors_investments_image[2])) echo intval($wizors_investments_image[1]) .'x' . intval($wizors_investments_image[2]); ?>"
	data-src="<?php if (!empty($wizors_investments_image[0])) echo esc_url($wizors_investments_image[0]); ?>"
	>

	<?php
	$wizors_investments_image_hover = 'icon';
	if (in_array($wizors_investments_image_hover, array('icons', 'zoom'))) $wizors_investments_image_hover = 'dots';
	// Featured image
	wizors_investments_show_post_featured(array(
		'hover' => $wizors_investments_image_hover,
		'thumb_size' => wizors_investments_get_thumb_size( strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false || $wizors_investments_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. wizors_investments_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'wizors-investments') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>