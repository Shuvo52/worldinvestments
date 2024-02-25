<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
$wizors_investments_full_content = wizors_investments_get_theme_option('blog_content') != 'excerpt' || in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'));
$wizors_investments_animation = wizors_investments_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($wizors_investments_post_format) ); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	><?php


	// Title and post meta
	if (get_the_title() != '') {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('wizors_investments_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			do_action('wizors_investments_action_before_post_meta'); 

			// Post meta
			wizors_investments_show_post_meta(array(
				'categories' => false,
				'date' => true,
				'edit' => false,
                'author' => true,
				'seo' => false,
				'share' => false,
				'counters' => 'comments'	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .post_header --><?php
	}

    // Featured image
    wizors_investments_show_post_featured(array( 'thumb_size' => wizors_investments_get_thumb_size( strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));


    // Post content
	?><div class="post_content entry-content"><?php
		if ($wizors_investments_full_content) {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'wizors-investments' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wizors-investments' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$wizors_investments_show_learn_more = !in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'));

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
			// More button
			if ( $wizors_investments_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'wizors-investments'); ?></a></p><?php
			}

		}
	?></div><!-- .entry-content -->
</article>