<?php
/* Instagram Feed ( Instagram Feed ) support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_instagram_feed_theme_setup9')) {
	add_action( 'after_setup_theme', 'wizors_investments_instagram_feed_theme_setup9', 9 );
	function wizors_investments_instagram_feed_theme_setup9() {
		if (is_admin()) {
			add_filter( 'wizors_investments_filter_tgmpa_required_plugins',		'wizors_investments_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Check if Instagram Feed ( Instagram Feed ) installed and activated
if ( !function_exists( 'wizors_investments_exists_instagram_feed' ) ) {
	function wizors_investments_exists_instagram_feed() {
		return defined('SBIVER');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'wizors_investments_instagram_feed_tgmpa_required_plugins' ) ) {
	
	function wizors_investments_instagram_feed_tgmpa_required_plugins($list=array()) {
		if (in_array('instagram-feed', wizors_investments_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Feed', 'wizors-investments'),
					'slug' 		=> 'instagram-feed',
					'required' 	=> false
				);
		return $list;
	}
}
?>