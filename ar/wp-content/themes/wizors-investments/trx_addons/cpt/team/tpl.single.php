<?php
/**
 * The template to display the team member's page
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

global $TRX_ADDONS_STORAGE;

get_header();

while ( have_posts() ) { the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'team_member_page itemscope' ); ?>
		itemscope itemtype="//schema.org/Article">
		<?php
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);

			// Image
			if ( has_post_thumbnail() ) {
				?><div class="team_member_featured">
					<div class="team_member_avatar">
						<?php
						the_post_thumbnail( trx_addons_get_thumb_size('team'), array(
									'alt' => the_title_attribute( array( 'echo' => false ) ),
									'itemprop' => 'image'
									)
								);
						?>
					</div>
					<?php			
					if (!empty($meta['socials'])) {
						?><div class="team_member_socials"><?php echo trim(trx_addons_get_socials_links_custom($meta['socials'])); ?></div><?php
					}
					?>
				</div>
				<?php
			}
			
			// Title and Description
			?>
		<section class="team_member_header">	

			
			<div class="team_member_description">
				<h2 class="team_member_title"><?php the_title(); ?></h2>
				<h6 class="team_member_position"><?php echo trim($meta['subtitle']); ?></h6>
				<div class="team_member_details">
					<?php
					$override_options = apply_filters('trx_addons_filter_meta_box_fields', $TRX_ADDONS_STORAGE['meta_box_'.get_post_type()], get_post_type());
					foreach ($override_options as $k=>$v) {
						if (!empty($v['details']) && !empty($meta[$k])) {
							?><div class="team_member_details_<?php echo esc_attr($k); ?>"><span class="team_member_details_label"><?php echo esc_html($v['title']); ?>: </span><span class="team_member_details_value"><a href="mailto:<?php echo antispambot($meta[$k]); ?>"><?php echo esc_html($meta[$k]); ?></a></span></div><?php
						}
					}
					?>
				</div>
				<?php
				if (!empty($meta['brief_info'])) {
					?>
					<div class="team_member_brief_info">
						<h5 class="team_member_brief_info_title"><?php esc_attr_e('Brief info', 'wizors-investments'); ?></h5>
						<div class="team_member_brief_info_text"><?php echo wp_kses_data(wpautop($meta['brief_info'])); ?></div>
					</div>
					<?php
				}
				?>
			</div>

		</section>
		<?php

		// Post content
		?><section class="team_member_content entry-content" itemprop="articleBody"><?php
			the_content( );
		?></section><!-- .entry-content --><?php

	?></article><?php

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>