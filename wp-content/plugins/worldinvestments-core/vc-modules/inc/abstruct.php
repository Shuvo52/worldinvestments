<?php
abstract class WI_VC_Modules {

	public $name;
	public $base;
	public $translate;

	public function __construct() {
		add_action( 'init', array( $this, 'vc_map' ) );
		add_shortcode( $this->base, array( $this, 'shortcode' ) );
	}

	abstract public function fields();
	abstract public function shortcode( $atts, $content );

	public function vc_map() {
		$fields = $this->fields();
		vc_map( array(
			"name" 				=> $this->name,
			"base"				=> $this->base,
			"class" 			=> "",
			"icon" 				=> "smartowl_shortcode",
			"admin_enqueue_css" => plugins_url( 'assets/vc.css', dirname(__FILE__) ),
			"front_enqueue_css" => plugins_url( 'assets/vc.css', dirname(__FILE__) ),
			"controls" => "full",
			"category" => __( 'WI', 'worldinvestments-core'),
			"params" => $fields,
			)
		);
	}
}