<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($wizors_investments_columns).' post_format_'.esc_attr($wizors_investments_post_format) ); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	>

	<?php
	$wizors_investments_image_hover = wizors_investments_get_theme_option('image_hover');
	// Featured image
	wizors_investments_show_post_featured(array(
		'thumb_size' => wizors_investments_get_thumb_size(strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false || $wizors_investments_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $wizors_investments_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $wizors_investments_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>