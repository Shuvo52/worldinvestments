<?php
/* Theme-specific action to configure ThemeREX Addons components
------------------------------------------------------------------------------- */


/* ThemeREX Addons components
------------------------------------------------------------------------------- */

if (!function_exists('wizors_investments_trx_addons_theme_specific_setup1')) {
	add_action( 'after_setup_theme', 'wizors_investments_trx_addons_theme_specific_setup1', 1 );
	add_action( 'trx_addons_action_save_options', 'wizors_investments_trx_addons_theme_specific_setup1', 8 );
	function wizors_investments_trx_addons_theme_specific_setup1() {
		if (wizors_investments_exists_trx_addons()) {
			add_filter( 'trx_addons_cv_enable',				'wizors_investments_trx_addons_cv_enable');
			add_filter( 'trx_addons_cpt_list',				'wizors_investments_trx_addons_cpt_list');
			add_filter( 'trx_addons_sc_list',				'wizors_investments_trx_addons_sc_list');
			add_filter( 'trx_addons_widgets_list',			'wizors_investments_trx_addons_widgets_list');

            //Add new params
            add_filter('trx_addons_sc_map',                  'wizors_investments_specific_sc_add_map', 10, 2);

            //Add new atts to shortcode
            add_filter('trx_addons_sc_atts',                'wizors_investments_specific_sc_atts', 10, 2);
		}
	}
}

// CV
if ( !function_exists( 'wizors_investments_trx_addons_cv_enable' ) ) {
	
	function wizors_investments_trx_addons_cv_enable($enable=false) {
		// To do: return false if theme not use CV functionality
		return false;
	}
}

// CPT
if ( !function_exists( 'wizors_investments_trx_addons_cpt_list' ) ) {
	
	function wizors_investments_trx_addons_cpt_list($list=array()) {
		// To do: Enable/Disable CPT via add/remove it in the list
        unset($list['portfolio']);
        unset($list['resume']);
        unset($list['courses']);
        unset($list['dishes']);
        unset($list['certificates']);
		return $list;
	}
}

// Shortcodes
if ( !function_exists( 'wizors_investments_trx_addons_sc_list' ) ) {
	
	function wizors_investments_trx_addons_sc_list($list=array()) {
		// To do: Add/Remove shortcodes into list
		return $list;
	}
}

// Widgets
if ( !function_exists( 'wizors_investments_trx_addons_widgets_list' ) ) {
	
	function wizors_investments_trx_addons_widgets_list($list=array()) {
		// To do: Add/Remove widgets into list
		// If you add widget - in the theme's folder must exists /trx_addons/widgets/new_widget_name/new_widget_name.php
        unset($list['aboutme']);
        unset($list['banner']);
        unset($list['flickr']);
        unset($list['popular_posts']);
        unset($list['recent_news']);
        unset($list['twitter']);
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('wizors_investments_trx_addons_theme_specific_setup3')) {
	add_action( 'after_setup_theme', 'wizors_investments_trx_addons_theme_specific_setup3', 3 );
	function wizors_investments_trx_addons_theme_specific_setup3() {
		
		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if (wizors_investments_exists_courses()) {
			wizors_investments_storage_merge_array('options', '', array(
				'courses' => array(
					"title" => esc_html__('Courses', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select parameters to display the courses pages', 'wizors-investments') ),
					"type" => "section"
					),
				'expand_content_courses' => array(
					"title" => esc_html__('Expand content', 'wizors-investments'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'wizors-investments') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'header_style_courses' => array(
					"title" => esc_html__('Header style', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select style to display the site header on the courses pages', 'wizors-investments') ),
					"std" => 'inherit',
					"options" => wizors_investments_get_list_header_styles(true),
					"type" => "select"
					),
				'header_position_courses' => array(
					"title" => esc_html__('Header position', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select position to display the site header on the courses pages', 'wizors-investments') ),
					"std" => 'inherit',
					"options" => wizors_investments_get_list_header_positions(true),
					"type" => "select"
					),
				'header_widgets_courses' => array(
					"title" => esc_html__('Header widgets', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the courses pages', 'wizors-investments') ),
					"std" => 'hide',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_widgets_courses' => array(
					"title" => esc_html__('Sidebar widgets', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select sidebar to show on the courses pages', 'wizors-investments') ),
					"std" => 'courses_widgets',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_position_courses' => array(
					"title" => esc_html__('Sidebar position', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the courses pages', 'wizors-investments') ),
					"refresh" => false,
					"std" => 'left',
					"options" => wizors_investments_get_list_sidebars_positions(true),
					"type" => "select"
					),
				'hide_sidebar_on_single_courses' => array(
					"title" => esc_html__('Hide sidebar on the single course', 'wizors-investments'),
					"desc" => wp_kses_data( __("Hide sidebar on the single course's page", 'wizors-investments') ),
					"std" => 0,
					"type" => "checkbox"
					),
				'widgets_above_page_courses' => array(
					"title" => esc_html__('Widgets above the page', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'wizors-investments') ),
					"std" => 'hide',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_above_content_courses' => array(
					"title" => esc_html__('Widgets above the content', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'wizors-investments') ),
					"std" => 'hide',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_content_courses' => array(
					"title" => esc_html__('Widgets below the content', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'wizors-investments') ),
					"std" => 'hide',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_page_courses' => array(
					"title" => esc_html__('Widgets below the page', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'wizors-investments') ),
					"std" => 'hide',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_scheme_courses' => array(
					"title" => esc_html__('Footer Color Scheme', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'wizors-investments') ),
					"std" => 'dark',
					"options" => wizors_investments_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_courses' => array(
					"title" => esc_html__('Footer widgets', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'wizors-investments') ),
					"std" => 'footer_widgets',
					"options" => wizors_investments_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_columns_courses' => array(
					"title" => esc_html__('Footer columns', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'wizors-investments') ),
					"dependency" => array(
						'footer_widgets_courses' => array('^hide')
					),
					"std" => 0,
					"options" => wizors_investments_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_courses' => array(
					"title" => esc_html__('Footer fullwide', 'wizors-investments'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'wizors-investments') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Add mobile menu to the plugin's cached menu list
if ( !function_exists( 'wizors_investments_trx_addons_menu_cache' ) ) {
	add_filter( 'trx_addons_filter_menu_cache', 'wizors_investments_trx_addons_menu_cache');
	function wizors_investments_trx_addons_menu_cache($list=array()) {
		if (in_array('#menu_main', $list)) $list[] = '#menu_mobile';
		return $list;
	}
}

// Add vars into localize array
if (!function_exists('wizors_investments_trx_addons_localize_script')) {
	add_filter( 'wizors_investments_filter_localize_script','wizors_investments_trx_addons_localize_script' );
	function wizors_investments_trx_addons_localize_script($arr) {
		$arr['alter_link_color'] = wizors_investments_get_scheme_color('alter_link');
		return $arr;
	}
}


// Add theme-specific layouts to the list
if (!function_exists('wizors_investments_trx_addons_theme_specific_default_layouts')) {
	add_filter( 'trx_addons_filter_default_layouts',	'wizors_investments_trx_addons_theme_specific_default_layouts');
	function wizors_investments_trx_addons_theme_specific_default_layouts($default_layouts=array()) {
        require_once trailingslashit( get_template_directory() ) . 'theme-specific/trx_addons.layouts.php';
		return isset($layouts) && is_array($layouts) && count($layouts) > 0
						? array_merge($default_layouts, $layouts)
						: $default_layouts;
	}
}

// Disable override header image on team pages
if ( !function_exists( 'wizors_investments_trx_addons_allow_override_header_image' ) ) {
	add_filter( 'wizors_investments_filter_allow_override_header_image', 'wizors_investments_trx_addons_allow_override_header_image' );
	function wizors_investments_trx_addons_allow_override_header_image($allow) {
		return wizors_investments_is_team_page() || wizors_investments_is_portfolio_page() ? false : $allow;
	}
}

// Hide sidebar on the team pages
if ( !function_exists( 'wizors_investments_trx_addons_sidebar_present' ) ) {
	add_filter( 'wizors_investments_filter_sidebar_present', 'wizors_investments_trx_addons_sidebar_present' );
	function wizors_investments_trx_addons_sidebar_present($present) {
		return !is_single() && (wizors_investments_is_team_page() || wizors_investments_is_portfolio_page()) ? false : $present;
	}
}


// WP Editor addons
//------------------------------------------------------------------------

// Theme-specific configure of the WP Editor
if ( !function_exists( 'wizors_investments_trx_addons_editor_init' ) ) {
	if (is_admin()) add_filter( 'tiny_mce_before_init', 'wizors_investments_trx_addons_editor_init', 11);
	function wizors_investments_trx_addons_editor_init($opt) {
		if (wizors_investments_exists_trx_addons()) {
			// Add style 'Arrow' to the 'List styles'
			// Remove 'false &&' from condition below to add new style to the list
			if (!empty($opt['style_formats'])) {
				$style_formats = json_decode($opt['style_formats'], true);
				if (is_array($style_formats) && count($style_formats)>0 ) {
					foreach ($style_formats as $k=>$v) {
                        if ( $v['title'] == esc_html__('Inline', 'wizors-investments') ) {
                            $style_formats[$k]['items'][] = array(
                                'title' => esc_html__('Accent with margin', 'wizors-investments'),
                                'inline' => 'span',
                                'classes' => 'trx_addons_accentmargin'
                            );
                        }

					}
					$opt['style_formats'] = json_encode( $style_formats );		
				}
			}
		}
		return $opt;
	}
}


// Theme-specific thumb sizes
//------------------------------------------------------------------------

// Replace thumb sizes to the theme-specific
if ( !function_exists( 'wizors_investments_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'wizors_investments_trx_addons_add_thumb_sizes');
	function wizors_investments_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// Return theme-specific thumb size instead removed plugin's thumb size
if ( !function_exists( 'wizors_investments_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'wizors_investments_trx_addons_get_thumb_size');
	function wizors_investments_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
                            'trx_addons-thumb-serv',
                            'trx_addons-thumb-serv-@retina',
                            'trx_addons-thumb-team',
                            'trx_addons-thumb-team-@retina',
                            'trx_addons-thumb-post',
                            'trx_addons-thumb-post-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							),
							array(
							'wizors_investments-thumb-huge',
							'wizors_investments-thumb-huge-@retina',
							'wizors_investments-thumb-big',
							'wizors_investments-thumb-big-@retina',
							'wizors_investments-thumb-med',
							'wizors_investments-thumb-med-@retina',
                                'wizors_investments-thumb-serv',
                                'wizors_investments-thumb-serv-@retina',
                                'wizors_investments-thumb-team',
                                'wizors_investments-thumb-team-@retina',
                                'wizors_investments-thumb-post',
                                'wizors_investments-thumb-post-@retina',
							'wizors_investments-thumb-tiny',
							'wizors_investments-thumb-tiny-@retina',
							'wizors_investments-thumb-masonry-big',
							'wizors_investments-thumb-masonry-big-@retina',
							'wizors_investments-thumb-masonry',
							'wizors_investments-thumb-masonry-@retina',
							),
							$thumb_size);
	}
}

// Get thumb size for the team items
if ( !function_exists( 'wizors_investments_trx_addons_team_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_team_thumb_size',	'wizors_investments_trx_addons_team_thumb_size', 10, 2);
	function wizors_investments_trx_addons_team_thumb_size($thumb_size='', $team_type='') {
		return $team_type == 'default' ? wizors_investments_get_thumb_size('med') : $thumb_size;
	}
}



// Shortcodes support
//------------------------------------------------------------------------

// Return tag for the item's title
if ( !function_exists( 'wizors_investments_trx_addons_sc_item_title_tag' ) ) {
	add_filter( 'trx_addons_filter_sc_item_title_tag', 'wizors_investments_trx_addons_sc_item_title_tag');
	function wizors_investments_trx_addons_sc_item_title_tag($tag='') {
		return $tag=='h1' ? 'h2' : $tag;
	}
}

// Return args for the item's button
if ( !function_exists( 'wizors_investments_trx_addons_sc_item_button_args' ) ) {
	add_filter( 'trx_addons_filter_sc_item_button_args', 'wizors_investments_trx_addons_sc_item_button_args');
	function wizors_investments_trx_addons_sc_item_button_args($args, $sc='') {
		if (false && $sc != 'sc_button') {
			$args['type'] = 'simple';
			$args['icon_type'] = 'fontawesome';
			$args['icon_fontawesome'] = 'icon-down-big';
			$args['icon_position'] = 'top';
		}
		return $args;
	}
}

// Add new types in the shortcodes
if ( !function_exists( 'wizors_investments_trx_addons_sc_type' ) ) {
	add_filter( 'trx_addons_sc_type', 'wizors_investments_trx_addons_sc_type', 10, 2);
	function wizors_investments_trx_addons_sc_type($list, $sc) {

        if (in_array($sc, array('trx_sc_button'))) {
            $list[ esc_html__('Dark', 'wizors-investments') ] = 'dark_button';
        }
        if (in_array($sc, array('trx_sc_team'))) {
            $list[ esc_html__('Full', 'wizors-investments') ] = 'full';
        }
		return $list;
	}
}

// Add new styles to the Google map
if ( !function_exists( 'wizors_investments_trx_addons_sc_googlemap_styles' ) ) {
	add_filter( 'trx_addons_filter_sc_googlemap_styles',	'wizors_investments_trx_addons_sc_googlemap_styles');
	function wizors_investments_trx_addons_sc_googlemap_styles($list) {
		$list[esc_html__('Dark', 'wizors-investments')] = 'dark';
        $list[esc_html__('Grey', 'wizors-investments')] = 'grey';
		return $list;
	}
}


// Add params to the shortcode
if ( !function_exists('wizors_investments_specific_sc_add_map') ) {
    function wizors_investments_specific_sc_add_map($params, $sc) {
        //Promo image2
        if (in_array($sc, array('trx_sc_skills'))) {

            $params['params'][8]['params'][] = array(
                "param_name" => "year",
                "heading" => esc_html__("Year for this skills", 'wizors-investments'),
                "description" => wp_kses_data( __("Enter year for this skills (only for pie)", 'wizors-investments') ),
                'type' => 'textfield'
            );
            $params['params'][8]['params'][] = array(
                "param_name" => "text",
                "heading" => esc_html__("Text under title", 'wizors-investments'),
                "description" => wp_kses_data( __("Text under title (only for counters)", 'wizors-investments') ),
                'type' => 'textfield'
            );
        }
        return $params;
    }
}

// Add params to the default shortcode's atts
if ( !function_exists( 'wizors_investments_specific_sc_atts' ) ) {
    function wizors_investments_specific_sc_atts($atts, $sc) {
        // Promo image
        if ($sc == 'trx_sc_skills')
            $atts['year'] = '';

        return $atts;
    }
}