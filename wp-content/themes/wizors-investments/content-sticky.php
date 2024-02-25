<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
$wizors_investments_animation = wizors_investments_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($wizors_investments_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($wizors_investments_post_format) ); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	wizors_investments_show_post_featured(array(
		'thumb_size' => wizors_investments_get_thumb_size($wizors_investments_columns==1 ? 'big' : ($wizors_investments_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			// Post meta
			wizors_investments_show_post_meta();
			?>
		</div><!-- .entry-header -->
		<?php
	}
    // Post content area
    ?><div class="post_content_inner"><?php
            if (has_excerpt()) {
                the_excerpt();
            } else if (strpos(get_the_content('!--more'), '!--more')!==false) {
                the_content( '' );
            } else if (in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'))) {
                the_content();
            } else if (substr(get_the_content(), 0, 1)!='[') {
                the_excerpt();
            }
            ?></div><?php
        ?>
</article></div>