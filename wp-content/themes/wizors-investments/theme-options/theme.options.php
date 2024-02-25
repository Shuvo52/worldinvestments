<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('wizors_investments_options_theme_setup1') ) {
	add_action( 'after_setup_theme', 'wizors_investments_options_theme_setup1', 1 );
	function wizors_investments_options_theme_setup1() {
		
		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		wizors_investments_storage_set('settings', array(
			
			'ajax_views_counter'		=> true,						// Use AJAX for increment posts counter (if cache plugins used) 
																		// or increment posts counter then loading page (without cache plugin)
			'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins
		
			'max_load_fonts'			=> 3,							// Max fonts number to load from Google fonts or from uploaded fonts
		
			'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio
		
			'max_excerpt_length'		=> 60,							// Max words number for the excerpt in the blog style 'Excerpt'.
																		// For style 'Classic' - get half from this value
			'message_maxlength'			=> 1000							// Max length of the message from contact form
			
		));
		
		
		
		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		wizors_investments_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'PT Serif',
				'family' => 'serif',
				'styles' => '400'		// Parameter 'style' used only for the Google fonts
				),
			// Font-face packed with theme
            array(
                'name'	 => 'Unna',
                'family' => 'serif',
                'styles' => '400'		// Parameter 'style' used only for the Google fonts
            ),
            // Font-face packed with theme
            array(
                'name'	 => 'Montserrat',
                'family' => 'sans-serif',
                'styles' => '400,700'		// Parameter 'style' used only for the Google fonts
            )
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		wizors_investments_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		wizors_investments_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'wizors-investments'),
				'font-family'		=> 'PT Serif,serif',
				'font-size' 		=> '14px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'font-style'		=> 'normal',
				'line-height'		=> '1.6em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.6em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'wizors-investments'),
				'font-family'		=> 'Unna, serif',
				'font-size' 		=> '5.714rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '0.9em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0.35em',
				'margin-bottom'		=> '0.5em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'wizors-investments'),
				'font-family'		=> 'Unna, serif',
				'font-size' 		=> '4.643rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '0.91em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0.8em',
				'margin-bottom'		=> '0.53em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'wizors-investments'),
				'font-family'		=> 'Unna, serif',
				'font-size' 		=> '3.214rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '1.4em',
				'margin-bottom'		=> '0.77em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'wizors-investments'),
				'font-family'		=> 'Unna, serif',
				'font-size' 		=> '2.5em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.15em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '1.67em',
				'margin-bottom'		=> '1.0435em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'wizors-investments'),
				'font-family'		=> 'Unna, serif',
				'font-size' 		=> '2.143rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.18em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.7em',
				'margin-bottom'		=> '0.8em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'wizors-investments'),
				'font-family'		=> 'Montserrat, sans-serif',
				'font-size' 		=> '0.786rem',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.4706em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1.1px',
				'margin-top'		=> '3.6em',
				'margin-bottom'		=> '2.1412em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'wizors-investments'),
				'font-family'		=> 'Montserrat, sans-serif',
				'font-size' 		=> '1.8em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'wizors-investments'),
				'font-family'		=> 'Montserrat, sans-serif',
				'font-size' 		=> '11px',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.4px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'wizors-investments'),
				'font-family'		=> 'PT Serif, serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'wizors-investments'),
				'font-family'		=> 'PT Serif, serif',
				'font-size' 		=> '14px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the main menu items', 'wizors-investments'),
				'font-family'		=> 'Montserrat, sans-serif',
				'font-size' 		=> '13px',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.85px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'wizors-investments'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'wizors-investments'),
				'font-family'		=> 'Montserrat, sans-serif',
				'font-size' 		=> '11px',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '2px'
				)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		wizors_investments_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'wizors-investments'),
				'colors' => array(

					// Whole block border and background
					'bg_color'				=> '#ffffff',
					'bd_color'				=> '#f2f0e8',
		
					// Text and links colors
					'text'					=> '#808080',
					'text_light'			=> '#c7c5c5',
					'text_dark'				=> '#313335',
					'text_link'				=> '#c6b477',
					'text_hover'			=> '#5c575b',
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#f2f0e8',
					'alter_bg_hover'		=> '#e6e4da',
					'alter_bd_color'		=> '#faf9f5',
					'alter_bd_hover'		=> '#4d4a51',
					'alter_text'			=> '#d78a75',
					'alter_light'			=> '#91c2b2',
					'alter_dark'			=> '#efd0c8',
					'alter_link'			=> '#c87d69',
					'alter_hover'			=> '#b6a56c',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#f3f0e9',
					'input_bg_hover'		=> '#e7eaed',
					'input_bd_color'		=> '#5e5b62',
					'input_bd_hover'		=> '#49474c',
					'input_text'			=> '#e8e5db',
					'input_light'			=> '#7bac9c',
					'input_dark'			=> '#4d4a51',
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#ffffff',
					'inverse_light'			=> '#F4524D',
					'inverse_dark'			=> '#39363d',
					'inverse_link'			=> '#ffffff',
					'inverse_hover'			=> '#1d1d1d',
				)
			),
		
			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'wizors-investments'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'				=> '#0e0d12',
					'bd_color'				=> '#1c1b1f',
		
					// Text and links colors
					'text'					=> '#9d9c99',
					'text_light'			=> '#5f5f5f',
					'text_dark'				=> '#ffffff',
					'text_link'				=> '#c6b477',
					'text_hover'			=> '#ffaa5f',
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#1e1d22',
					'alter_bg_hover'		=> '#28272e',
					'alter_bd_color'		=> '#4d4a51',
					'alter_bd_hover'		=> '#4d4a51',
					'alter_text'			=> '#9d9c99',
					'alter_light'			=> '#5f5f5f',
					'alter_dark'			=> '#39363d',
					'alter_link'			=> '#ffaa5f',
					'alter_hover'			=> '#fe7259',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#5e5b62',
					'input_bg_hover'		=> '#5e5b62',
					'input_bd_color'		=> '#5e5b62',
					'input_bd_hover'		=> '#353535',
					'input_text'			=> '#b7b7b7',
					'input_light'			=> '#5f5f5f',
					'input_dark'			=> '#ffffff',
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#ffffff',
					'inverse_light'			=> '#5f5f5f',
					'inverse_dark'			=> '#000000',
					'inverse_link'			=> '#ffffff',
					'inverse_hover'			=> '#1d1d1d',
				)
			)
		
		));
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('wizors_investments_options_create')) {

	function wizors_investments_options_create() {

		wizors_investments_storage_set('options', array(
		
			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'wizors-investments') ),
				"type" => "section"
				),
		
		
			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'wizors-investments') ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'wizors-investments'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'wizors-investments'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'wizors-investments'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 'header-default',
				"options" => wizors_investments_get_list_header_styles(),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 'default',
				"options" => wizors_investments_get_list_header_positions(),
				"type" => "select"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'wizors-investments') ),
				),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"dependency" => array(
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => wizors_investments_get_list_range(0,6),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'wizors-investments') ),
				"type" => "info"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'wizors-investments'),
					'left'	=> esc_html__('Left',	'wizors-investments'),
					'right'	=> esc_html__('Right',	'wizors-investments')
				),
				"type" => "switch"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'wizors-investments'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'wizors-investments') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'wizors-investments'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'wizors-investments') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'wizors-investments'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'wizors-investments') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo settings', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select logo images for the normal and Retina displays', 'wizors-investments') ),
				"type" => "info"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'wizors-investments'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'wizors-investments') ),
				"std" => 1,
				"type" => "checkbox"
				),
			
		
		
			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Options for the content area', 'wizors-investments') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select width of the body content', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'wizors-investments'),
					'wide'		=> esc_html__('Wide',		'wizors-investments'),
					'fullwide'	=> esc_html__('Fullwide',	'wizors-investments'),
					'fullscreen'=> esc_html__('Fullscreen',	'wizors-investments')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"std" => 'default',
				"options" => wizors_investments_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'wizors-investments'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'wizors-investments') ),
				"std" => 0,
				"type" => "checkbox"
				),
            'privacy_text' => array(
                "title" => esc_html__("Text with Privacy Policy link", 'wizors-investments'),
                "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'wizors-investments') ),
                "std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'wizors-investments'), 'wizors_investments_kses_content' ),
                "type"  => "text"
            ),
			'border_radius' => array(
				"title" => esc_html__('Border radius', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify the border radius of the form fields and buttons in pixels or other valid CSS units', 'wizors-investments') ),
				"std" => 0,
				"type" => "text"
				),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'wizors-investments') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"std" => '',
				"type" => "image"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'wizors-investments') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'sidebar_widgets',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Sidebar Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => wizors_investments_get_list_sidebars_positions(),
				"type" => "select"
				),
			'hide_sidebar_on_single' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'wizors-investments'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post's pages", 'wizors-investments') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets above the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets below the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'wizors-investments')
				),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
		
		
		
			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'wizors-investments') ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Footer', 'wizors-investments')
				),
				"std" => 'footer-default',
				"options" => apply_filters('wizors_investments_filter_list_footer_styles', array(
					'footer-default' => esc_html__('Default Footer',	'wizors-investments')
				)),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'wizors-investments')
				),
				"std" => 'dark',
				"options" => wizors_investments_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'wizors-investments')
				),
				"std" => 'footer_widgets',
				"options" => wizors_investments_get_list_sidebars(false, true),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'wizors-investments')
				),
				"dependency" => array(
					'footer_widgets' => array('^hide')
				),
				"std" => 4,
				"options" => wizors_investments_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'wizors-investments'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'wizors-investments')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'wizors-investments'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'wizors-investments') ),
				'refresh' => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'wizors-investments') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'wizors-investments') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'wizors-investments'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'wizors-investments') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'wizors-investments'),
				"desc" => wp_kses_data( __('Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'wizors-investments') ),
				"std" => esc_html__('AncoraThemes &copy; {Y}. All rights reserved.', 'wizors-investments'),
				"refresh" => false,
				"type" => "textarea"
				),
		
		
		
			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'wizors-investments') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'wizors-investments') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'wizors-investments') ),
				"std" => 'excerpt',
				"options" => wizors_investments_get_list_blog_styles(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'wizors-investments'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'wizors-investments') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style_home' => array(
				"title" => esc_html__('Header style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select style to display the site header on the homepage', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_header_styles(true),
				"type" => "select"
				),
			'header_position_home' => array(
				"title" => esc_html__('Header position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to display the site header on the homepage', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_header_positions(true),
				"type" => "select"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'wizors-investments') ),
				"std" => 'header_widgets',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'wizors-investments') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars_positions(true),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'wizors-investments') ),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'wizors-investments') ),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'wizors-investments') ),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'wizors-investments') ),
				"std" => 'hide',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			
		
		
			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'wizors-investments'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'wizors-investments') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'wizors-investments') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => 'excerpt',
				"options" => wizors_investments_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'wizors-investments'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'wizors-investments') ),
				"std" => 2,
				"options" => wizors_investments_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => wizors_investments_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => wizors_investments_array_merge(array(0 => esc_html__('- Select category -', 'wizors-investments')), wizors_investments_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'wizors-investments'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array( 
				"title" => esc_html__('Pagination style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"std" => "links",
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'wizors-investments'),
					'links'	=> esc_html__("Older/Newest", 'wizors-investments'),
					'more'	=> esc_html__("Load more", 'wizors-investments'),
					'infinite' => esc_html__("Infinite scroll", 'wizors-investments')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'wizors-investments'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'wizors-investments'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'wizors-investments') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array( 
				"title" => esc_html__('Posts content', 'wizors-investments'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'wizors-investments') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'wizors-investments'),
					'fullpost'	=> esc_html__('Full post',	'wizors-investments')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'wizors-investments'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'wizors-investments') ),
				"std" => 5,
				"type" => "text"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'wizors-investments'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post?', 'wizors-investments') ),
				"std" => 2,
				"options" => wizors_investments_get_list_range(2,4),
				"type" => "select"
				),
			'related_style' => array(
				"title" => esc_html__('Related posts style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select style of the related posts output', 'wizors-investments') ),
				"std" => 2,
				"options" => wizors_investments_get_list_styles(1,2),
				"type" => "select"
				),
			"blog_animation" => array( 
				"title" => esc_html__('Animation for the posts', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'wizors-investments')
				),
				"dependency" => array(
					'#page_template' => array('blog.php'),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => "none",
				"options" => wizors_investments_get_list_animations_in(),
				"type" => "select"
				),
			'header_style_blog' => array(
				"title" => esc_html__('Header style', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select style to display the site header on the blog archive', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_header_styles(true),
				"type" => "select"
				),
			'header_position_blog' => array(
				"title" => esc_html__('Header position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to display the site header on the blog archive', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_header_positions(true),
				"type" => "select"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'wizors-investments') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars_positions(true),
				"type" => "select"
				),
			'hide_sidebar_on_single_blog' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'wizors-investments'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post", 'wizors-investments') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'wizors-investments') ),
				"std" => 'inherit',
				"options" => wizors_investments_get_list_sidebars(true, true),
				"type" => "select"
				),
			
		
		
		
			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'wizors-investments'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'wizors-investments') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'wizors-investments') ),
				"priority" => 1000,
				"type" => "section"
				),
		
			'color_settings' => array(
				"title" => esc_html__('Color settings', 'wizors-investments'),
				"desc" => '',
				"std" => 'simple',
				"options" => array(
					"simple"  => esc_html__("Simple", 'wizors-investments'),
					"advanced" => esc_html__("Advanced", 'wizors-investments')
				),
				"refresh" => false,
				"type" => "switch"
				),
		
			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'wizors-investments'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'wizors-investments') ),
				"std" => 'default',
				"options" => wizors_investments_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),
		
			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'wizors-investments'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'wizors-investments'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),
		
			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
				
			'bg_color' => array(
				"title" => esc_html__('Background color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'text' => array(
				"title" => esc_html__('Text', 'wizors-investments'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'wizors-investments') ),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'wizors-investments'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'wizors-investments') ),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'wizors-investments'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'wizors-investments'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'wizors-investments'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'wizors-investments'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the active field', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'wizors-investments'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'wizors-investments') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$wizors_investments_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'wizors-investments'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'wizors-investments') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'wizors-investments')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'wizors-investments'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'wizors-investments') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'wizors-investments')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(
		
			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'wizors-investments'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'wizors-investments') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'wizors-investments') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'wizors-investments'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'wizors-investments') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'wizors-investments') ),
				"refresh" => false,
				"std" => '$wizors_investments_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=wizors_investments_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(esc_html__('Font %s', 'wizors-investments'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'wizors-investments'),
				"desc" => '',
				"refresh" => false,
				"std" => '$wizors_investments_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'wizors-investments'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'wizors-investments') )
							: '',
				"refresh" => false,
				"std" => '$wizors_investments_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'wizors-investments'),
					'serif' => esc_html__('serif', 'wizors-investments'),
					'sans-serif' => esc_html__('sans-serif', 'wizors-investments'),
					'monospace' => esc_html__('monospace', 'wizors-investments'),
					'cursive' => esc_html__('cursive', 'wizors-investments'),
					'fantasy' => esc_html__('fantasy', 'wizors-investments')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'wizors-investments'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'wizors-investments') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'wizors-investments') )
							: '',
				"refresh" => false,
				"std" => '$wizors_investments_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = wizors_investments_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								: esc_html(sprintf(esc_html__('%s settings', 'wizors-investments'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								: wp_kses( sprintf(__('Font settings of the "%s" tag.', 'wizors-investments'), $tag), 'wizors_investments_kses_content' ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = wizors_investments_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'wizors-investments'),
						'100' => esc_html__('100 (Light)', 'wizors-investments'), 
						'200' => esc_html__('200 (Light)', 'wizors-investments'), 
						'300' => esc_html__('300 (Thin)',  'wizors-investments'),
						'400' => esc_html__('400 (Normal)', 'wizors-investments'),
						'500' => esc_html__('500 (Semibold)', 'wizors-investments'),
						'600' => esc_html__('600 (Semibold)', 'wizors-investments'),
						'700' => esc_html__('700 (Bold)', 'wizors-investments'),
						'800' => esc_html__('800 (Black)', 'wizors-investments'),
						'900' => esc_html__('900 (Black)', 'wizors-investments')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'wizors-investments'),
						'normal' => esc_html__('Normal', 'wizors-investments'), 
						'italic' => esc_html__('Italic', 'wizors-investments')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'wizors-investments'),
						'none' => esc_html__('None', 'wizors-investments'), 
						'underline' => esc_html__('Underline', 'wizors-investments'),
						'overline' => esc_html__('Overline', 'wizors-investments'),
						'line-through' => esc_html__('Line-through', 'wizors-investments')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'wizors-investments'),
						'none' => esc_html__('None', 'wizors-investments'), 
						'uppercase' => esc_html__('Uppercase', 'wizors-investments'),
						'lowercase' => esc_html__('Lowercase', 'wizors-investments'),
						'capitalize' => esc_html__('Capitalize', 'wizors-investments')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$wizors_investments_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		wizors_investments_storage_merge_array('options', '', $fonts);

		// Add Header Video if WP version < 4.7
		if (!function_exists('get_header_video_url')) {
			wizors_investments_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'wizors-investments'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'wizors-investments') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'wizors-investments')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('wizors_investments_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'wizors_investments_options_theme_setup2', 2 );
	function wizors_investments_options_theme_setup2() {
		wizors_investments_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('wizors_investments_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'wizors_investments_options_theme_setup5', 5 );
	function wizors_investments_options_theme_setup5() {
		wizors_investments_storage_set('options_reloaded', false);
		wizors_investments_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('wizors_investments_load_custom_options')) {
		add_action( 'wp_loaded', 'wizors_investments_load_custom_options' );
		function wizors_investments_load_custom_options() {
			if (!wizors_investments_storage_get('options_reloaded')) {
				wizors_investments_storage_set('options_reloaded', true);
				wizors_investments_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('wizors_investments_load_theme_options') ) {
	function wizors_investments_load_theme_options() {
		$options = wizors_investments_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$wizors_investments_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = wizors_investments_get_value_gpc($k);
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				wizors_investments_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			wizors_investments_customizer_save_css();
		} else {
			do_action('wizors_investments_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('wizors_investments_override_theme_options') ) {
	add_action( 'wp', 'wizors_investments_override_theme_options', 1 );
	function wizors_investments_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			wizors_investments_storage_set('blog_archive', true);
			wizors_investments_storage_set('blog_template', get_the_ID());
		}
		wizors_investments_storage_set('blog_mode', wizors_investments_detect_blog_mode());
		if (is_singular()) {
			wizors_investments_storage_set('options_meta', get_post_meta(get_the_ID(), 'wizors_investments_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('wizors_investments_get_theme_option')) {
	function wizors_investments_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!wizors_investments_storage_isset('post_options_meta', $post_id))
				wizors_investments_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'wizors_investments_options', true));
			if (wizors_investments_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = wizors_investments_storage_get_array('post_options_meta', $post_id, $name);
				if (!wizors_investments_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && wizors_investments_storage_isset('options')) {
			if ( !wizors_investments_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'wizors-investments'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
						wp_die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = wizors_investments_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = wizors_investments_get_value_gpc($name . '_' . $blog_mode);
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = wizors_investments_get_value_gpc($name);
				// Override option from current page settings (if exists)
				} else if (wizors_investments_storage_isset('options_meta', $name) && !wizors_investments_is_inherit(wizors_investments_storage_get_array('options_meta', $name))) {
					$rez = wizors_investments_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && wizors_investments_storage_isset('options', $name . '_' . $blog_mode, 'val') && !wizors_investments_is_inherit(wizors_investments_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = wizors_investments_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (wizors_investments_storage_isset('options', $name, 'val')) {
					$rez = wizors_investments_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('wizors_investments_check_theme_option')) {
	function wizors_investments_check_theme_option($name) {
		return wizors_investments_storage_isset('options', $name);
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('wizors_investments_get_theme_dependencies') ) {
	function wizors_investments_get_theme_dependencies() {
		$options = wizors_investments_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency'])) 
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('wizors_investments_get_theme_setting')) {
	function wizors_investments_get_theme_setting($name) {
		return wizors_investments_storage_isset('settings', $name) ? wizors_investments_storage_get_array('settings', $name) : false;
	}
}


// Set theme setting
if ( !function_exists( 'wizors_investments_set_theme_setting' ) ) {
	function wizors_investments_set_theme_setting($option_name, $value) {
		if (wizors_investments_storage_isset('settings', $option_name))
			wizors_investments_storage_set_array('settings', $option_name, $value);
	}
}
?>