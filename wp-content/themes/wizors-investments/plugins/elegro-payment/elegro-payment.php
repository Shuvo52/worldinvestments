<?php
/* elegro Crypto Payment support functions
------------------------------------------------------------------------------- */


// Check if this plugin installed and activated
if ( ! function_exists( 'wizors_investments_exists_elegro_payment' ) ) {
	function wizors_investments_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('wizors_investments_elegro_payment_theme_setup9')) {
    add_action('after_setup_theme', 'wizors_investments_elegro_payment_theme_setup9', 9);
    function wizors_investments_elegro_payment_theme_setup9()
    {
        if (wizors_investments_exists_elegro_payment()) {
            add_action('wp_enqueue_scripts', 'wizors_investments_elegro_payment_frontend_scripts', 1100);
            add_filter('wizors_investments_filter_merge_styles', 'wizors_investments_elegro_payment_merge_styles');
        }
        if (is_admin()) {
            add_filter('wizors_investments_filter_tgmpa_required_plugins', 'wizors_investments_elegro_payment_tgmpa_required_plugins');
        }
    }
}



// Filter to add in the required plugins list
if (!function_exists('wizors_investments_elegro_payment_tgmpa_required_plugins')) {
    function wizors_investments_elegro_payment_tgmpa_required_plugins($list = array())
    {
        if (in_array('elegro-payment', wizors_investments_storage_get('required_plugins'))) {

            $list[] = array(
                'name' => esc_html__('Elegro Crypto Payment', 'wizors-investments'),
                'slug' => 'elegro-payment',
                'required' => false
            );
        }
        return $list;
    }
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if (!function_exists('wizors_investments_elegro_payment_frontend_scripts')) {
    function wizors_investments_elegro_payment_frontend_scripts()
    {
        if (wizors_investments_exists_elegro_payment()) {
            if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('plugins/elegro-payment/elegro-payment.css') != '')
                wp_enqueue_style('wizors-investments-elegro-payment', wizors_investments_get_file_url('plugins/elegro-payment/elegro-payment.css'), array(), null);
        }
    }
}

// Merge custom styles
if (!function_exists('wizors_investments_elegro_payment_merge_styles')) {
    function wizors_investments_elegro_payment_merge_styles($list)
    {
        $list[] = 'plugins/elegro-payment/elegro-payment.css';
        return $list;
    }
}