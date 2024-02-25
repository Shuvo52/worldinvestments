<?php
/*
Plugin Name: WorldInvestments Core
Plugin URI: https://worldinvestments.ae/
Description: WorldInvestments Core Plugin for WorldInvestments Hero Slider
Version: 1.0.1
Author: WorldInvestments
Author URI: https://worldinvestments.ae/

Create Date: 02-04-2024
*/

// Visual composer
add_action( 'after_setup_theme', 'wi_core_vc_modules', 17 );
function wi_core_vc_modules(){
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}
	require_once 'vc-modules/inc/abstruct.php';
	require_once 'vc-modules/hero-slider.php';	

	wp_enqueue_style( 'hero-slick', plugins_url() . '/worldinvestments-core/slick/slick.css', false, '1.0.0', 'all');
	wp_enqueue_style( 'slick-theme', plugins_url() . '/worldinvestments-core/slick/slick-theme.css', false, '1.0.0', 'all');

	wp_enqueue_script( 'hero-jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array('jquery'), '2.2.4');
	wp_enqueue_script( 'hero-slick-js', plugins_url() . '/worldinvestments-core/slick/slick.js', array('jquery'), '1.0.0');
	wp_enqueue_script( 'hero-wi-main-js', plugins_url() . '/worldinvestments-core/slick/wi-main.js', array('jquery'), '1.0.0');
}

