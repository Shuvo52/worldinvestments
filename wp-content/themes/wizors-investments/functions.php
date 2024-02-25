<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

// Theme storage
$WIZORS_INVESTMENTS_STORAGE = array(
	// Theme required plugin's slugs
	'required_plugins' => array(

		// Required plugins
		// DON'T COMMENT OR REMOVE NEXT LINES!
		'trx_addons',

		// Recommended (supported) plugins
		// If plugin not need - comment (or remove) it
		'essential-grid',
		'instagram-feed',
		'js_composer',
		'mailchimp-for-wp',
		'revslider',
		'vc-extensions-bundle',
		'woocommerce',
        'gdpr-compliance',
        'contact-form-7',
        'trx_updater',
        'elegro-payment'
		)
);


//-------------------------------------------------------
//-- Theme init
//-------------------------------------------------------

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('wizors_investments_theme_setup1') ) {
	add_action( 'after_setup_theme', 'wizors_investments_theme_setup1', 1 );
	function wizors_investments_theme_setup1() {
		// Make theme available for translation
		// Translations can be filed in the /languages directory
		// Attention! Translations must be loaded before first call any translation functions!
		load_theme_textdomain( 'wizors-investments', wizors_investments_get_folder_dir('languages') );

		// Set theme content width
		$GLOBALS['content_width'] = apply_filters( 'wizors_investments_filter_content_width', 1170 );
	}
}

if ( !function_exists('wizors_investments_theme_setup') ) {
	add_action( 'after_setup_theme', 'wizors_investments_theme_setup' );
	function wizors_investments_theme_setup() {

		// Add default posts and comments RSS feed links to head 
		add_theme_support( 'automatic-feed-links' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('wizors_investments_filter_add_thumb_sizes', array(
			'wizors_investments-thumb-huge'		=> array(1170, 658, true),
			'wizors_investments-thumb-big' 		=> array( 770, 406, true),
			'wizors_investments-thumb-med' 		=> array( 555, 603, true),
            'wizors_investments-thumb-serv' 		=> array( 370, 195, true),
            'wizors_investments-thumb-team' 		=> array( 270, 447, true),
            'wizors_investments-thumb-post' 		=> array( 295, 447, true),
			'wizors_investments-thumb-tiny' 		=> array(  110,  110, true),
			'wizors_investments-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'wizors_investments-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = wizors_investments_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'wizors_investments_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}
		
		// Custom header setup
		add_theme_support( 'custom-header', array(
			'header-text'=>false,
			'video' => true
			)
		);

		// Custom backgrounds setup
		add_theme_support( 'custom-background', array()	);
		
		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') ); 
 
 		// Autogenerate title tag
		add_theme_support('title-tag');
 		
		// Add theme menus
		add_theme_support('nav-menus');
		
		// Switch default markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		// WooCommerce Support
		add_theme_support( 'woocommerce' );

        // Next setting from the WooCommerce 3.0+ enable built-in image zoom on the single product page
        add_theme_support( 'wc-product-gallery-zoom' );

        // Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
        add_theme_support( 'wc-product-gallery-slider' );

        // Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
        add_theme_support( 'wc-product-gallery-lightbox' );

        // Gutenberg support
        add_theme_support( 'align-wide' );
		
		// Editor custom stylesheet - for user
		add_editor_style( array_merge(
			array(
				'css/editor-style.css',
				wizors_investments_get_file_url('css/fontello/css/fontello-embedded.css')
			),
			wizors_investments_theme_fonts_for_editor()
			)
		);	
	
		// Register navigation menu
		register_nav_menus(array(
			'menu_main' => esc_html__('Main Menu', 'wizors-investments'),
			'menu_mobile' => esc_html__('Mobile Menu', 'wizors-investments'),
			'menu_footer' => esc_html__('Footer Menu', 'wizors-investments')
			)
		);

		// Excerpt filters
		add_filter( 'excerpt_length',						'wizors_investments_excerpt_length' );
		add_filter( 'excerpt_more',							'wizors_investments_excerpt_more' );
		
		// Add required meta tags in the head
		add_action('wp_head',		 						'wizors_investments_wp_head', 1);
		
		// Add custom inline styles
		add_action('wp_footer',		 						'wizors_investments_wp_footer');
		add_action('admin_footer',	 						'wizors_investments_wp_footer');

		// Enqueue scripts and styles for frontend
		add_action('wp_enqueue_scripts', 					'wizors_investments_wp_scripts', 1000);			//priority 1000 - load styles before the plugin's support custom styles (priority 1100)
		add_action('wp_footer',		 						'wizors_investments_localize_scripts');
		add_action('wp_enqueue_scripts', 					'wizors_investments_wp_scripts_responsive', 2000);	//priority 2000 - load responsive after all other styles
		
		// Add body classes
		add_filter( 'body_class',							'wizors_investments_add_body_classes' );

		// Register sidebars
		add_action('widgets_init',							'wizors_investments_register_sidebars');

		// Set options for importer (before other plugins)
		add_filter( 'trx_addons_filter_importer_options',	'wizors_investments_importer_set_options', 9 );
	}

}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------
if ( !function_exists('wizors_investments_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'wizors_investments_image_sizes' );
	function wizors_investments_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('wizors_investments_filter_add_thumb_sizes', array(
			'wizors_investments-thumb-huge'		=> esc_html__( 'Fullsize image', 'wizors-investments' ),
			'wizors_investments-thumb-big'			=> esc_html__( 'Large image', 'wizors-investments' ),
			'wizors_investments-thumb-med'			=> esc_html__( 'Medium image', 'wizors-investments' ),
			'wizors_investments-thumb-tiny'		=> esc_html__( 'Small square avatar', 'wizors-investments' ),
			'wizors_investments-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'wizors-investments' ),
			'wizors_investments-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'wizors-investments' ),
			)
		);
		$mult = wizors_investments_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'wizors-investments' );
		}
		return $sizes;
	}
}


//-------------------------------------------------------
//-- Theme scripts and styles
//-------------------------------------------------------

// Load frontend scripts
if ( !function_exists( 'wizors_investments_wp_scripts' ) ) {
	
	function wizors_investments_wp_scripts() {
		
		// Enqueue styles
		//------------------------
		
		// Links to selected fonts
		$links = wizors_investments_theme_fonts_links();
		if (count($links) > 0) {
			foreach ($links as $slug => $link) {
				wp_enqueue_style( sprintf('wizors_investments-font-%s', $slug), $link );
			}
		}
		
		// Fontello styles must be loaded before main stylesheet
		// This style NEED the theme prefix, because style 'fontello' in some plugin contain different set of characters
		// and can't be used instead this style!
		wp_enqueue_style( 'fontello-icons',  wizors_investments_get_file_url('css/fontello/css/fontello-embedded.css') );

        // Merged styles
        if ( wizors_investments_is_off(wizors_investments_get_theme_option('debug_mode')) )
            wp_enqueue_style( 'wizors-investments-styles', wizors_investments_get_file_url('css/__styles.css') );
		// Load main stylesheet
		$main_stylesheet = get_template_directory_uri() . '/style.css';
		wp_enqueue_style( 'wizors-investments-main', $main_stylesheet, array(), null );

		// Load child stylesheet (if different) after the main stylesheet and fontello icons (important!)
		$child_stylesheet = get_stylesheet_directory_uri() . '/style.css';
		if ($child_stylesheet != $main_stylesheet) {
			wp_enqueue_style( 'wizors-investments-child', $child_stylesheet, array('wizors-investments-main'), null );
		}

		// Add custom bg image for the body_style == 'boxed'
		if ( wizors_investments_get_theme_option('body_style') == 'boxed' && ($bg_image = wizors_investments_get_theme_option('boxed_bg_image')) != '' )
			wp_add_inline_style( 'wizors-investments-main', '.body_style_boxed { background-image:url('.esc_url($bg_image).') }' );



		// Custom colors
		if ( !is_customize_preview() && !isset($_GET['color_scheme']) && wizors_investments_is_off(wizors_investments_get_theme_option('debug_mode')) )
			wp_enqueue_style( 'wizors-investments-colors', wizors_investments_get_file_url('css/__colors.css') );
		else
			wp_add_inline_style( 'wizors-investments-main', wizors_investments_customizer_get_css() );

		// Add post nav background
		wizors_investments_add_bg_in_post_nav();

		// Disable loading JQuery UI CSS
		wp_deregister_style('jquery_ui');
		wp_deregister_style('date-picker-css');


		// Enqueue scripts	
		//------------------------
		
		// Modernizr will load in head before other scripts and styles
		if ( in_array(substr(wizors_investments_get_theme_option('blog_style'), 0, 7), array('gallery', 'portfol', 'masonry')) )
			wp_enqueue_script( 'modernizr', wizors_investments_get_file_url('js/theme.gallery/modernizr.min.js'), array(), null, false );

		// Superfish Menu
		// Attention! To prevent duplicate this script in the plugin and in the menu, don't merge it!
		wp_enqueue_script( 'superfish', wizors_investments_get_file_url('js/superfish.js'), array('jquery'), null, true );
		
		// Merged scripts
		if ( wizors_investments_is_off(wizors_investments_get_theme_option('debug_mode')) )
			wp_enqueue_script( 'wizors-investments-init', wizors_investments_get_file_url('js/__scripts.js'), array('jquery'), null, true );
		else {
			// Skip link focus
			wp_enqueue_script( 'skip-link-focus-fix', wizors_investments_get_file_url('js/skip-link-focus-fix.js'), null, true );
			// Background video
			$header_video = wizors_investments_get_header_video();
			if (!empty($header_video) && !wizors_investments_is_inherit($header_video))
				wp_enqueue_script( 'bideo', wizors_investments_get_file_url('js/bideo.js'), array(), null, true );
			// Theme scripts
			wp_enqueue_script( 'wizors-investments-utils', wizors_investments_get_file_url('js/_utils.js'), array('jquery'), null, true );
			wp_enqueue_script( 'wizors-investments-init', wizors_investments_get_file_url('js/_init.js'), array('jquery'), null, true );
		}
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Media elements library	
		if (wizors_investments_get_theme_setting('use_mediaelements')) {
			wp_enqueue_style ( 'mediaelement' );
			wp_enqueue_style ( 'wp-mediaelement' );
			wp_enqueue_script( 'mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}
	}
}

// Add variables to the scripts in the frontend
if ( !function_exists( 'wizors_investments_localize_scripts' ) ) {
	
	function wizors_investments_localize_scripts() {

		$video = wizors_investments_get_header_video();

		wp_localize_script( 'wizors-investments-init', 'WIZORS_INVESTMENTS_STORAGE', apply_filters( 'wizors_investments_filter_localize_script', array(
			// AJAX parameters
			'ajax_url' => esc_url(admin_url('admin-ajax.php')),
			'ajax_nonce' => esc_attr(wp_create_nonce(admin_url('admin-ajax.php'))),
			
			// Site base url
			'site_url' => get_site_url(),
						
			// Site color scheme
			'site_scheme' => sprintf('scheme_%s', wizors_investments_get_theme_option('color_scheme')),
			
			// User logged in
			'user_logged_in' => is_user_logged_in() ? true : false,
			
			// Window width to switch the site header to the mobile layout
			'mobile_layout_width' => 767,
						
			// Sidemenu options
			'menu_side_stretch' => wizors_investments_get_theme_option('menu_side_stretch') > 0 ? true : false,
			'menu_side_icons' => wizors_investments_get_theme_option('menu_side_icons') > 0 ? true : false,

			// Video background
			'background_video' => wizors_investments_is_from_uploads($video) ? $video : '',

			// Video and Audio tag wrapper
			'use_mediaelements' => wizors_investments_get_theme_setting('use_mediaelements') ? true : false,

			// Messages max length
			'message_maxlength'	=> intval(wizors_investments_get_theme_setting('message_maxlength')),

			
			// Internal vars - do not change it!
			
			// Flag for review mechanism
			'admin_mode' => false,

			// E-mail mask
			'email_mask' => '^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$',
			
			// Strings for translation
			'strings' => array(
					'ajax_error'		=> esc_html__('Invalid server answer!', 'wizors-investments'),
					'error_global'		=> esc_html__('Error data validation!', 'wizors-investments'),
					'name_empty' 		=> esc_html__("The name can't be empty", 'wizors-investments'),
					'name_long'			=> esc_html__('Too long name', 'wizors-investments'),
					'email_empty'		=> esc_html__('Too short (or empty) email address', 'wizors-investments'),
					'email_long'		=> esc_html__('Too long email address', 'wizors-investments'),
					'email_not_valid'	=> esc_html__('Invalid email address', 'wizors-investments'),
					'text_empty'		=> esc_html__("The message text can't be empty", 'wizors-investments'),
					'text_long'			=> esc_html__('Too long message text', 'wizors-investments')
					)
			))
		);
	}
}

// Load responsive styles (priority 2000 - load it after main styles and plugins custom styles)
if ( !function_exists( 'wizors_investments_wp_scripts_responsive' ) ) {
	
	function wizors_investments_wp_scripts_responsive() {
		wp_enqueue_style( 'wizors-investments-responsive', wizors_investments_get_file_url('css/responsive.css') );
	}
}

//  Add meta tags and inline scripts in the header for frontend
if (!function_exists('wizors_investments_wp_head')) {
	
	function wizors_investments_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="format-detection" content="telephone=no">
		<link rel="profile" href="//gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
}

// Add theme specified classes to the body
if ( !function_exists('wizors_investments_add_body_classes') ) {
	
	function wizors_investments_add_body_classes( $classes ) {
		$classes[] = 'body_tag';	// Need for the .scheme_self
		$classes[] = 'scheme_' . esc_attr(wizors_investments_get_theme_option('color_scheme'));

		$blog_mode = wizors_investments_storage_get('blog_mode');
		$classes[] = 'blog_mode_' . esc_attr($blog_mode);
		$classes[] = 'body_style_' . esc_attr(wizors_investments_get_theme_option('body_style'));

		if (in_array($blog_mode, array('post', 'page'))) {
			$classes[] = 'is_single';
		} else {
			$classes[] = ' is_stream';
			$classes[] = 'blog_style_'.esc_attr(wizors_investments_get_theme_option('blog_style'));
			if (wizors_investments_storage_get('blog_template') > 0)
				$classes[] = 'blog_template';
		}
		
		if (wizors_investments_sidebar_present()) {
			$classes[] = 'sidebar_show sidebar_' . esc_attr(wizors_investments_get_theme_option('sidebar_position')) ;
		} else {
			$classes[] = 'sidebar_hide';
			if (wizors_investments_is_on(wizors_investments_get_theme_option('expand_content')))
				 $classes[] = 'expand_content';
		}
		
		if (wizors_investments_is_on(wizors_investments_get_theme_option('remove_margins')))
			 $classes[] = 'remove_margins';

		$classes[] = 'header_style_' . esc_attr(wizors_investments_get_theme_option("header_style"));
		$classes[] = 'header_position_' . esc_attr(wizors_investments_get_theme_option("header_position"));

		$menu_style= wizors_investments_get_theme_option("menu_style");
		$classes[] = 'menu_style_' . esc_attr($menu_style) . (in_array($menu_style, array('left', 'right'))	? ' menu_style_side' : '');
		$classes[] = 'no_layout';
		
		return $classes;
	}
}
	
// Load inline styles
if ( !function_exists( 'wizors_investments_wp_footer' ) ) {
	
	//and add_action('admin_footer', 'wizors_investments_wp_footer');
	function wizors_investments_wp_footer() {
		// Get inline styles from storage
		if (($css = wizors_investments_storage_get('inline_styles')) != '') {
			wp_enqueue_style(  'wizors-investments-inline-styles',  wizors_investments_get_file_url('css/__inline.css') );
			wp_add_inline_style( 'wizors-investments-inline-styles', $css );
		}
	}
}


//-------------------------------------------------------
//-- Sidebars and widgets
//-------------------------------------------------------

// Register widgetized areas
if ( !function_exists('wizors_investments_register_sidebars') ) {
	
	function wizors_investments_register_sidebars() {
		$sidebars = wizors_investments_get_sidebars();
		if (is_array($sidebars) && count($sidebars) > 0) {
			foreach ($sidebars as $id=>$sb) {
				register_sidebar( array(
										'name'          => $sb['name'],
										'description'   => $sb['description'],
										'id'            => $id,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h5 class="widget_title">',
										'after_title'   => '</h5>'
										)
								);
			}
		}
	}
}

// Return theme specific widgetized areas
if ( !function_exists('wizors_investments_get_sidebars') ) {
	function wizors_investments_get_sidebars() {
		$list = apply_filters('wizors_investments_filter_list_sidebars', array(
			'sidebar_widgets'		=> array(
											'name' => esc_html__('Sidebar Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown on the main sidebar', 'wizors-investments')
											),
			'header_widgets'		=> array(
											'name' => esc_html__('Header Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown at the top of the page (in the page header area)', 'wizors-investments')
											),
			'above_page_widgets'	=> array(
											'name' => esc_html__('Above Page Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown below the header, but above the content and sidebar', 'wizors-investments')
											),
			'above_content_widgets' => array(
											'name' => esc_html__('Above Content Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown above the content, near the sidebar', 'wizors-investments')
											),
			'below_content_widgets' => array(
											'name' => esc_html__('Below Content Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown below the content, near the sidebar', 'wizors-investments')
											),
			'below_page_widgets' 	=> array(
											'name' => esc_html__('Below Page Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown below the content and sidebar, but above the footer', 'wizors-investments')
											),
			'footer_widgets'		=> array(
											'name' => esc_html__('Footer Widgets', 'wizors-investments'),
											'description' => esc_html__('Widgets to be shown at the bottom of the page (in the page footer area)', 'wizors-investments')
											),
            'custom_widgets'		=> array(
                    'name' => esc_html__('Custom Widgets', 'wizors-investments'),
                    'description' => esc_html__('Widgets to be shown at any of the page (in any area)', 'wizors-investments')
                )
			)
		);
		return $list;
	}
}


//-------------------------------------------------------
//-- Theme fonts
//-------------------------------------------------------

// Return links for all theme fonts
if ( !function_exists('wizors_investments_theme_fonts_links') ) {
	function wizors_investments_theme_fonts_links() {
		$links = array();
		
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$google_fonts_enabled = ( 'off' !== esc_html_x( 'on', 'Google fonts: on or off', 'wizors-investments' ) );
		$custom_fonts_enabled = ( 'off' !== esc_html_x( 'on', 'Custom fonts (included in the theme): on or off', 'wizors-investments' ) );
		
		if ( ($google_fonts_enabled || $custom_fonts_enabled) && !wizors_investments_storage_empty('load_fonts') ) {
			$load_fonts = (array)wizors_investments_storage_get('load_fonts');
			if (count($load_fonts) > 0) {
				$google_fonts = '';
				foreach ($load_fonts as $font) {
					$slug = wizors_investments_get_load_fonts_slug($font['name']);
					$url  = wizors_investments_get_file_url( sprintf('css/font-face/%s/stylesheet.css', $slug));
					if ($url != '') {
						if ($custom_fonts_enabled) {
							$links[$slug] = $url;
						}
					} else {
						if ($google_fonts_enabled) {
							$google_fonts .= ($google_fonts ? '|' : '') 
											. str_replace(' ', '+', $font['name'])
											. ':' 
											. (empty($font['styles']) ? '400,400italic,700,700italic' : $font['styles']);
						}
					}
				}
				if ($google_fonts && $google_fonts_enabled) {
					$links['google_fonts'] = sprintf('%s://fonts.googleapis.com/css?family=%s&subset=%s', wizors_investments_get_protocol(), $google_fonts, wizors_investments_get_theme_option('load_fonts_subset'));
				}
			}
		}
		return $links;
	}
}

// Return links for WP Editor
if ( !function_exists('wizors_investments_theme_fonts_for_editor') ) {
	function wizors_investments_theme_fonts_for_editor() {
		$links = array_values(wizors_investments_theme_fonts_links());
		if (is_array($links) && count($links) > 0) {
			for ($i=0; $i<count($links); $i++) {
				$links[$i] = str_replace(',', '%2C', $links[$i]);
			}
		}
		return $links;
	}
}


//-------------------------------------------------------
//-- The Excerpt
//-------------------------------------------------------
if ( !function_exists('wizors_investments_excerpt_length') ) {
	function wizors_investments_excerpt_length( $length ) {
		return max(1, wizors_investments_get_theme_setting('max_excerpt_length'));
	}
}

if ( !function_exists('wizors_investments_excerpt_more') ) {
	function wizors_investments_excerpt_more( $more ) {
		return '&hellip;';
	}
}
function wizors_investments_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wizors_investments_move_comment_field_to_bottom' );

//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( !function_exists( 'wizors_investments_importer_set_options' ) ) {
	
	function wizors_investments_importer_set_options($options=array()) {
		if (is_array($options)) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url(wizors_investments_get_protocol() . '://demofiles.ancorathemes.com/wizors/');
			// Required plugins
			$options['required_plugins'] = wizors_investments_storage_get('required_plugins');
			// Default demo
			$options['files']['default']['title'] = esc_html__('Wizors Investments Demo', 'wizors-investments');
			$options['files']['default']['domain_dev'] = esc_url('http://wizors.dv.ancorathemes.com');		// Developers domain
			$options['files']['default']['domain_demo']= esc_url('http://wizors.ancorathemes.com');		// Demo-site domain
		}
		return $options;
	}
}


// Add checkbox with "I agree ..."
if ( ! function_exists( 'wizors_investments_comment_form_agree' ) ) {
    add_filter('comment_form_fields', 'wizors_investments_comment_form_agree', 11);
    function wizors_investments_comment_form_agree( $comment_fields ) {
        $privacy_text = wizors_investments_get_privacy_text();
        if ( ! empty( $privacy_text ) ) {
            $comment_fields['i_agree_privacy_policy'] = wizors_investments_single_comments_field(
                array(
                    'form_style'        => 'default',
                    'field_type'        => 'checkbox',
                    'field_req'         => '',
                    'field_icon'        => '',
                    'field_value'       => '1',
                    'field_name'        => 'i_agree_privacy_policy',
                    'field_title'       => $privacy_text,
                )
            );
        }
        return $comment_fields;
    }
}



//-------------------------------------------------------
//-- Include theme (or child) PHP-files
//-------------------------------------------------------

require_once trailingslashit( get_template_directory() ) . 'includes/utils.php';
require_once trailingslashit( get_template_directory() ) . 'includes/storage.php';
require_once trailingslashit( get_template_directory() ) . 'includes/lists.php';
require_once trailingslashit( get_template_directory() ) . 'includes/wp.php';

if (is_admin()) {
	require_once trailingslashit( get_template_directory() ) . 'includes/tgmpa/class-tgm-plugin-activation.php';
	require_once trailingslashit( get_template_directory() ) . 'includes/admin.php';
}

require_once trailingslashit( get_template_directory() ) . 'theme-options/theme.customizer.php';

require_once trailingslashit( get_template_directory() ) . 'theme-specific/trx_addons.php';

require_once trailingslashit( get_template_directory() ) . 'includes/theme.tags.php';
require_once trailingslashit( get_template_directory() ) . 'includes/theme.hovers/theme.hovers.php';


// Plugins support
if (is_array($WIZORS_INVESTMENTS_STORAGE['required_plugins']) && count($WIZORS_INVESTMENTS_STORAGE['required_plugins']) > 0) {
	foreach ($WIZORS_INVESTMENTS_STORAGE['required_plugins'] as $plugin_slug) {
		$plugin_slug = sanitize_file_name($plugin_slug);
		$plugin_path = trailingslashit( get_template_directory() ) . sprintf('plugins/%s/%s.php', $plugin_slug, $plugin_slug);
		if (file_exists($plugin_path)) { require_once $plugin_path; }
	}
}
?>
