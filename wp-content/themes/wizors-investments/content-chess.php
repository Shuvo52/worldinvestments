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
$wizors_investments_columns = empty($wizors_investments_blog_style[1]) ? 1 : max(1, $wizors_investments_blog_style[1]);
$wizors_investments_expanded = !wizors_investments_sidebar_present() && wizors_investments_is_on(wizors_investments_get_theme_option('expand_content'));
$wizors_investments_post_format = get_post_format();
$wizors_investments_post_format = empty($wizors_investments_post_format) ? 'standard' : str_replace('post-format-', '', $wizors_investments_post_format);
$wizors_investments_animation = wizors_investments_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($wizors_investments_columns).' post_format_'.esc_attr($wizors_investments_post_format) ); ?>
	<?php echo (!wizors_investments_is_off($wizors_investments_animation) ? ' data-animation="'.esc_attr(wizors_investments_get_animation_classes($wizors_investments_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($wizors_investments_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.the_title_attribute( array( 'echo' => false ) ).'"]');
	}

	// Featured image
	wizors_investments_show_post_featured( array(
											'class' => $wizors_investments_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => wizors_investments_get_thumb_size(
																	strpos(wizors_investments_get_theme_option('body_style'), 'full')!==false
																		? ( $wizors_investments_columns > 1 ? 'huge' : 'original' )
																		: (	$wizors_investments_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('wizors_investments_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('wizors_investments_action_before_post_meta'); 

			// Post meta
			$wizors_investments_post_meta = wizors_investments_show_post_meta(array(
                    'categories' => false,
                    'date' => true,
                    'edit' => false,
                    'author' => true,
                    'seo' => false,
                    'share' => false,
                    'counters' => 'comments'	//comments,likes,views - comma separated in any combination
                )
								);
			wizors_investments_show_layout($wizors_investments_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$wizors_investments_show_learn_more = !in_array($wizors_investments_post_format, array('link', 'aside', 'status', 'quote'));
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
				wizors_investments_show_layout($wizors_investments_post_meta);
			}
			// More button
			if ( $wizors_investments_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'wizors-investments'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>