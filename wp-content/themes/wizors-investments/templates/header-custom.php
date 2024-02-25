<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.06
 */

$wizors_investments_header_css = $wizors_investments_header_image = '';
$wizors_investments_header_video = wizors_investments_get_header_video();
if (true || empty($wizors_investments_header_video)) {
	$wizors_investments_header_image = get_header_image();
	if (wizors_investments_is_on(wizors_investments_get_theme_option('header_image_override')) && apply_filters('wizors_investments_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($wizors_investments_cat_img = wizors_investments_get_category_image()) != '')
				$wizors_investments_header_image = $wizors_investments_cat_img;
		} else if (is_singular() || wizors_investments_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$wizors_investments_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($wizors_investments_header_image)) $wizors_investments_header_image = $wizors_investments_header_image[0];
			} else
				$wizors_investments_header_image = '';
		}
	}
}

$wizors_investments_header_id = str_replace('header-custom-', '', wizors_investments_get_theme_option("header_style"));
if ((int) $wizors_investments_header_id == 0) {
    $wizors_investments_header_id = wizors_investments_get_post_id(array(
                                                'name' => $wizors_investments_header_id,
                                                'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
                                                )
                                            );
} else {
    $wizors_investments_header_id = apply_filters('trx_addons_filter_get_translated_layout', $wizors_investments_header_id);
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($wizors_investments_header_id);
						echo !empty($wizors_investments_header_image) || !empty($wizors_investments_header_video) ? ' with_bg_image' : ' without_bg_image';
						if ($wizors_investments_header_video!='') echo ' with_bg_video';
						if ($wizors_investments_header_image!='') echo ' '.esc_attr(wizors_investments_add_inline_style('background-image: url('.esc_url($wizors_investments_header_image).');'));
						if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
						if (wizors_investments_is_on(wizors_investments_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(wizors_investments_is_inherit(wizors_investments_get_theme_option('header_scheme')) 
														? wizors_investments_get_theme_option('color_scheme') 
														: wizors_investments_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($wizors_investments_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('wizors_investments_action_show_layout', $wizors_investments_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );


		
?></header>