<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_cf7_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_cf7_theme_setup9', 9 );
	function wizors_investments_cf7_theme_setup9() {
		
		if (wizors_investments_exists_cf7()) {
			add_action( 'wp_enqueue_scripts', 								'wizors_investments_cf7_frontend_scripts', 1100 );
			add_filter( 'wizors_investments_filter_merge_styles',						'wizors_investments_cf7_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',			'wizors_investments_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_cf7_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_cf7_tgmpa_required_plugins($list=array()) {
		if (in_array('contact-form-7', wizors_investments_storage_get('required_plugins'))) {
			// CF7 plugin
			$list[] = array(
					'name' 		=> esc_html__('Contact Form 7', 'wizors-investments'),
					'slug' 		=> 'contact-form-7',
					'required' 	=> false
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( !function_exists( 'wizors_investments_exists_cf7' ) ) {
	function wizors_investments_exists_cf7() {
		return class_exists('WPCF7');
	}
}
	
// Enqueue custom styles
if ( !function_exists( 'wizors_investments_cf7_frontend_scripts' ) ) {
	
	function wizors_investments_cf7_frontend_scripts() {
		if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('plugins/contact-form-7/contact-form-7.css')!='')
			wp_enqueue_style( 'wizors-investments-contact-form-7',  wizors_investments_get_file_url('plugins/contact-form-7/contact-form-7.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'wizors_investments_cf7_merge_styles' ) ) {
	
	function wizors_investments_cf7_merge_styles($list) {
		$list[] = 'plugins/contact-form-7/contact-form-7.css';
		return $list;
	}
}
?>