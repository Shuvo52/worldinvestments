<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

wizors_investments_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', wizors_investments_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded', wizors_investments_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
wp_enqueue_script( 'masonry', wizors_investments_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
wp_enqueue_script( 'wizors-investments-gallery-script', wizors_investments_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$wizors_investments_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$wizors_investments_sticky_out = is_array($wizors_investments_stickies) && count($wizors_investments_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$wizors_investments_cat = wizors_investments_get_theme_option('parent_cat');
	$wizors_investments_post_type = wizors_investments_get_theme_option('post_type');
	$wizors_investments_taxonomy = wizors_investments_get_post_type_taxonomy($wizors_investments_post_type);
	$wizors_investments_show_filters = wizors_investments_get_theme_option('show_filters');
	$wizors_investments_tabs = array();
	if (!wizors_investments_is_off($wizors_investments_show_filters)) {
		$wizors_investments_args = array(
			'type'			=> $wizors_investments_post_type,
			'child_of'		=> $wizors_investments_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $wizors_investments_taxonomy,
			'pad_counts'	=> false
		);
		$wizors_investments_portfolio_list = get_terms($wizors_investments_args);
		if (is_array($wizors_investments_portfolio_list) && count($wizors_investments_portfolio_list) > 0) {
			$wizors_investments_tabs[$wizors_investments_cat] = esc_html__('All', 'wizors-investments');
			foreach ($wizors_investments_portfolio_list as $wizors_investments_term) {
				if (isset($wizors_investments_term->term_id)) $wizors_investments_tabs[$wizors_investments_term->term_id] = $wizors_investments_term->name;
			}
		}
	}
	if (count($wizors_investments_tabs) > 0) {
		$wizors_investments_portfolio_filters_ajax = true;
		$wizors_investments_portfolio_filters_active = $wizors_investments_cat;
		$wizors_investments_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters wizors_investments_tabs wizors_investments_tabs_ajax">
			<ul class="portfolio_titles wizors_investments_tabs_titles">
				<?php
				foreach ($wizors_investments_tabs as $wizors_investments_id=>$wizors_investments_title) {
					?><li><a href="<?php echo esc_url(wizors_investments_get_hash_link(sprintf('#%s_%s_content', $wizors_investments_portfolio_filters_id, $wizors_investments_id))); ?>" data-tab="<?php echo esc_attr($wizors_investments_id); ?>"><?php echo esc_html($wizors_investments_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$wizors_investments_ppp = wizors_investments_get_theme_option('posts_per_page');
			if (wizors_investments_is_inherit($wizors_investments_ppp)) $wizors_investments_ppp = '';
			foreach ($wizors_investments_tabs as $wizors_investments_id=>$wizors_investments_title) {
				$wizors_investments_portfolio_need_content = $wizors_investments_id==$wizors_investments_portfolio_filters_active || !$wizors_investments_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $wizors_investments_portfolio_filters_id, $wizors_investments_id)); ?>"
					class="portfolio_content wizors_investments_tabs_content"
					data-blog-template="<?php echo esc_attr(wizors_investments_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(wizors_investments_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($wizors_investments_ppp); ?>"
					data-post-type="<?php echo esc_attr($wizors_investments_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($wizors_investments_taxonomy); ?>"
					data-cat="<?php echo esc_attr($wizors_investments_id); ?>"
					data-parent-cat="<?php echo esc_attr($wizors_investments_cat); ?>"
					data-need-content="<?php echo (false===$wizors_investments_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($wizors_investments_portfolio_need_content) 
						wizors_investments_show_portfolio_posts(array(
							'cat' => $wizors_investments_id,
							'parent_cat' => $wizors_investments_cat,
							'taxonomy' => $wizors_investments_taxonomy,
							'post_type' => $wizors_investments_post_type,
							'page' => 1,
							'sticky' => $wizors_investments_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		wizors_investments_show_portfolio_posts(array(
			'cat' => $wizors_investments_cat,
			'parent_cat' => $wizors_investments_cat,
			'taxonomy' => $wizors_investments_taxonomy,
			'post_type' => $wizors_investments_post_type,
			'page' => 1,
			'sticky' => $wizors_investments_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>