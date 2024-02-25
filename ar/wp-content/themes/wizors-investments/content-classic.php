<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_blog_style = explode('_', wizors_investments_get_theme_option('blog_style'));
$wizors_investments_columns = empty($wizors_investments_blog_style[1]) ? 2 : max(2, $wizors_investments_blog_style[1]);
$wizors_investments_expanded = !wizors_investments_sidebar_present() && wizors_investments_is_on(wizors_investments_get_theme_option('expand_content'));
$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
$wizors_investments_animation = wizors_investments_get_theme_option('blog_animation');

?><div class="<?php wizors_investments_show_layout($wizors_investments_blog_style[0] == 'classic' ? 'column' : 'masonry_item masonry_item'); ?>-1_<?php echo esc_attr($wizors_investments_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_format_'.esc_attr($wizors_investments_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($wizors_investments_columns)
					. ' post_layout_'.esc_attr($wizors_investments_blog_style[0]) 
					. ' post_layout_'.esc_attr($wizors_investments_blog_style[0]).'_'.esc_attr($wizors_investments_columns)
					); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	wizors_investments_show_post_featured( array( 'thumb_size' => wizors_investments_get_thumb_size($wizors_investments_blog_style[0] == 'classic'
													? (strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false 
															? ( $wizors_investments_columns > 2 ? 'big' : 'huge' )
															: (	$wizors_investments_columns > 2
																? ($wizors_investments_expanded ? 'med' : 'small')
																: ($wizors_investments_expanded ? 'big' : 'med')
																)
														)
													: (strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false 
															? ( $wizors_investments_columns > 2 ? 'masonry-big' : 'full' )
															: (	$wizors_investments_columns <= 2 && $wizors_investments_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('wizors_investments_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('wizors_investments_action_before_post_meta'); 

			// Post meta
			wizors_investments_show_post_meta(array(
				'categories' => true,
				'date' => true,
				'edit' => $wizors_investments_columns < 3,
				'seo' => false,
				'share' => false,
				'counters' => 'comments',
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$wizors_investments_show_learn_more = false;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'))) {
			wizors_investments_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $wizors_investments_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'wizors-investments'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>