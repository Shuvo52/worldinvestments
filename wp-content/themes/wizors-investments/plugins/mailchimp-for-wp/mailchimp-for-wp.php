<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_mailchimp_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_mailchimp_theme_setup9', 9 );
	function wizors_investments_mailchimp_theme_setup9() {
		if (wizors_investments_exists_mailchimp()) {
			add_action( 'wp_enqueue_scripts',							'wizors_investments_mailchimp_frontend_scripts', 1100 );
			add_filter( 'wizors_investments_filter_merge_styles',					'wizors_investments_mailchimp_merge_styles');
			add_filter( 'wizors_investments_filter_get_css',						'wizors_investments_mailchimp_get_css', 10, 4);
		}
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',		'wizors_investments_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'wizors_investments_exists_mailchimp' ) ) {
	function wizors_investments_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_mailchimp_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_mailchimp_tgmpa_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', wizors_investments_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'wizors-investments'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if ( !function_exists( 'wizors_investments_mailchimp_frontend_scripts' ) ) {
	
	function wizors_investments_mailchimp_frontend_scripts() {
		if (wizors_investments_exists_mailchimp()) {
			if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('plugins/mailchimp-for-wp/mailchimp-for-wp.css')!='')
				wp_enqueue_style( 'wizors-investments-mailchimp-for-wp',  wizors_investments_get_file_url('plugins/mailchimp-for-wp/mailchimp-for-wp.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'wizors_investments_mailchimp_merge_styles' ) ) {
	
	function wizors_investments_mailchimp_merge_styles($list) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}

// Add css styles into global CSS stylesheet
if (!function_exists('wizors_investments_mailchimp_get_css')) {
	
	function wizors_investments_mailchimp_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		
			
			$rad = wizors_investments_get_border_radius();
			$css['fonts'] .= <<<CSS

.mc4wp-form .mc4wp-form-fields input[type="email"],
.mc4wp-form .mc4wp-form-fields input[type="submit"] {
	-webkit-border-radius: {$rad};
	   -moz-border-radius: {$rad};
	    -ms-border-radius: {$rad};
			border-radius: {$rad};
}

CSS;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

.mc4wp-form input[type="email"] {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bg_color']};
	color: {$colors['text']};
}
.mc4wp-form input[type="submit"] {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}
.mc4wp-form input[type="submit"]:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['alter_link_blend']};
}

.mc4wp-form .mc4wp-response a,
.mc4wp-form label a{
    color: {$colors['inverse_link']};
}

CSS;
		}

		return $css;
	}
}
?>