<?php
/* WPBakery PageBuilder Extensions Bundle support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_vc_extensions_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_vc_extensions_theme_setup9', 9 );
	function wizors_investments_vc_extensions_theme_setup9() {
		if (wizors_investments_exists_visual_composer()) {
			add_action( 'wp_enqueue_scripts', 								'wizors_investments_vc_extensions_frontend_scripts', 1100 );
			add_filter( 'wizors_investments_filter_merge_styles',						'wizors_investments_vc_extensions_merge_styles' );
		}
	
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',		'wizors_investments_vc_extensions_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_vc_extensions_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_vc_extensions_tgmpa_required_plugins($list=array()) {
		if (in_array('vc-extensions-bundle', wizors_investments_storage_get('required_plugins'))) {
			$path = wizors_investments_get_file_dir('plugins/vc-extensions-bundle/vc-extensions-bundle.zip');
			$list[] = array(
					'name' 		=> esc_html__('WPBakery PageBuilder Extensions Bundle', 'wizors-investments'),
					'slug' 		=> 'vc-extensions-bundle',
                    'version'	=> '3.6.0',
					'source'	=> !empty($path) ? $path : 'upload://vc-extensions-bundle.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if VC Extensions installed and activated
if ( !function_exists( 'wizors_investments_exists_vc_extensions' ) ) {
	function wizors_investments_exists_vc_extensions() {
		return class_exists('Vc_Manager') && class_exists('VC_Extensions_CQBundle');
	}
}
	
// Enqueue VC custom styles
if ( !function_exists( 'wizors_investments_vc_extensions_frontend_scripts' ) ) {
	
	function wizors_investments_vc_extensions_frontend_scripts() {
		if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('plugins/vc-extensions-bundle/vc-extensions-bundle.css')!='')
			wp_enqueue_style( 'wizors-investments-vc-extensions-bundle',  wizors_investments_get_file_url('plugins/vc-extensions-bundle/vc-extensions-bundle.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'wizors_investments_vc_extensions_merge_styles' ) ) {
	
	function wizors_investments_vc_extensions_merge_styles($list) {
		$list[] = 'plugins/vc-extensions-bundle/vc-extensions-bundle.css';
		return $list;
	}
}
?>