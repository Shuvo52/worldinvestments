<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_essential_grid_theme_setup9', 9 );
	function wizors_investments_essential_grid_theme_setup9() {
		if (wizors_investments_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'wizors_investments_essential_grid_frontend_scripts', 1100 );
			add_filter( 'wizors_investments_filter_merge_styles',					'wizors_investments_essential_grid_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',		'wizors_investments_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'wizors_investments_exists_essential_grid' ) ) {
	function wizors_investments_exists_essential_grid() {
		return defined('EG_PLUGIN_PATH');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_essential_grid_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', wizors_investments_storage_get('required_plugins'))) {
			$path = wizors_investments_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'wizors-investments'),
						'slug' 		=> 'essential-grid',
                        'version'	=> '3.0.7',
						'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
						'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'wizors_investments_essential_grid_frontend_scripts' ) ) {
	
	function wizors_investments_essential_grid_frontend_scripts() {
		if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('plugins/essential-grid/essential-grid.css')!='')
			wp_enqueue_style( 'wizors-investments-essential-grid',  wizors_investments_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'wizors_investments_essential_grid_merge_styles' ) ) {
	
	function wizors_investments_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}
?>