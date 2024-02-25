<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'wizors_investments_trx_updater_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'wizors_investments_trx_updater_theme_setup9', 9 );
    function wizors_investments_trx_updater_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'wizors_investments_filter_tgmpa_required_plugins', 'wizors_investments_trx_updater_tgmpa_required_plugins', 8 );
        }
    }
}


// Filter to add in the required plugins list
if ( ! function_exists( 'wizors_investments_trx_updater_tgmpa_required_plugins' ) ) {
    
    function wizors_investments_trx_updater_tgmpa_required_plugins( $list = array() ) {
        if (in_array('trx_updater', wizors_investments_storage_get('required_plugins'))) {
            $path = wizors_investments_get_file_dir( 'plugins/trx_updater/trx_updater.zip' );
                $list[] = array(

                    'name' 		=> esc_html__('ThemeREX Updater', 'wizors-investments'),
                    'slug'     => 'trx_updater',
                    'version'  => '1.4.1',
                    'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
                    'required' => false,
                );

        }
        return $list;
    }
}