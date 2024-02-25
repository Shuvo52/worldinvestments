<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_revslider_theme_setup9', 9 );
	function wizors_investments_revslider_theme_setup9() {
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',	'wizors_investments_revslider_tgmpa_required_plugins' );
		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'wizors_investments_exists_revslider' ) ) {
	function wizors_investments_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_revslider_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_revslider_tgmpa_required_plugins($list=array()) {
		if (in_array('revslider', wizors_investments_storage_get('required_plugins'))) {
			$path = wizors_investments_get_file_dir('plugins/revslider/revslider.zip');
			$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'wizors-investments'),
					'slug' 		=> 'revslider',
                    'version'	=> '6.2.23',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
?>