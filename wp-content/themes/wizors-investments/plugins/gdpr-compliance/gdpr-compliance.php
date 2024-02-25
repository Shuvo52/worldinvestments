<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_gdpr_compliance_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_gdpr_compliance_theme_setup9', 9 );
	function wizors_investments_gdpr_compliance_theme_setup9() {
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',		'wizors_investments_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_gdpr_compliance_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_gdpr_compliance_tgmpa_required_plugins($list=array()) {
        if (in_array('gdpr-compliance', wizors_investments_storage_get('required_plugins'))){
				$list[] = array(
					'name' 		=> esc_html__('WP GDPR Compliance', 'wizors-investments'),
					'slug' 		=> 'wp-gdpr-compliance',
					'required' 	=> false
				);
			}
		return $list;
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'wizors_investments_exists_gdpr_compliance' ) ) {
	function wizors_investments_exists_gdpr_compliance() {
        return function_exists('__gdpr_load_plugin') || defined('GDPR_VERSION');
	}
}
?>