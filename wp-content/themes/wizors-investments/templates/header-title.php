<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

// Page (category, tag, archive, author) title

if ( wizors_investments_need_page_title() ) {
	wizors_investments_sc_layouts_showed('title', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$wizors_investments_blog_title = wizors_investments_get_blog_title();
							$wizors_investments_blog_title_text = $wizors_investments_blog_title_class = $wizors_investments_blog_title_link = $wizors_investments_blog_title_link_text = '';
							if (is_array($wizors_investments_blog_title)) {
								$wizors_investments_blog_title_text = $wizors_investments_blog_title['text'];
								$wizors_investments_blog_title_class = !empty($wizors_investments_blog_title['class']) ? ' '.$wizors_investments_blog_title['class'] : '';
								$wizors_investments_blog_title_link = !empty($wizors_investments_blog_title['link']) ? $wizors_investments_blog_title['link'] : '';
								$wizors_investments_blog_title_link_text = !empty($wizors_investments_blog_title['link_text']) ? $wizors_investments_blog_title['link_text'] : '';
							} else
								$wizors_investments_blog_title_text = $wizors_investments_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($wizors_investments_blog_title_class); ?>"><?php
								$wizors_investments_top_icon = wizors_investments_get_category_icon();
								if (!empty($wizors_investments_top_icon)) {
									$wizors_investments_attr = wizors_investments_getimagesize($wizors_investments_top_icon);
									?><img src="<?php echo esc_url($wizors_investments_top_icon); ?>" alt="'.esc_attr__('img', 'wizors-investments').'" <?php if (!empty($wizors_investments_attr[3])) wizors_investments_show_layout($wizors_investments_attr[3]);?>><?php
								}
								echo wp_kses($wizors_investments_blog_title_text, 'wizors_investments_kses_content');
							?></h1>
							<?php
							if (!empty($wizors_investments_blog_title_link) && !empty($wizors_investments_blog_title_link_text)) {
								?><a href="<?php echo esc_url($wizors_investments_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($wizors_investments_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'wizors_investments_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>