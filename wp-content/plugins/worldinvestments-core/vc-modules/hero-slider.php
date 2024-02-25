<?php
class WI_VC_Hero_Slider extends WI_VC_Modules {

	public function __construct(){
		$this->name = __( "WI: Hero Slider", 'worldinvestments-core' );
		$this->base = 'wi-vc-hero';
		$this->translate = array(
			'title1' => __( "Hero Slider 1", 'worldinvestments-core' ),
			'title2' => __( "Hero Slider 2", 'worldinvestments-core' ),
			'title3' => __( "Hero Slider 3", 'worldinvestments-core' ),
			'link1' => __( "Past Image Link", 'worldinvestments-core' ),
			'link2' => __( "Past Image Link", 'worldinvestments-core' ),
			'link3' => __( "Past Image Link", 'worldinvestments-core' ),
		);
		parent::__construct();
	}

	public function fields(){
		$fields = array(
			array(
					"group" => "Options",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Title", 'worldinvestments-core' ),
					"param_name" => "title1",
					"value" => $this->translate['title1'],
				),
			array(
					"group" => "Options",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Title", 'worldinvestments-core' ),
					"param_name" => "title2",
					"value" => $this->translate['title2'],
				),
			array(
					"group" => "Options",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Title", 'worldinvestments-core' ),
					"param_name" => "title3",
					"value" => $this->translate['title3'],
				),
				array(
					"group" => "Image Link",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Link 1", 'worldinvestments-core' ),
					"param_name" => "link1",
					"value" => $this->translate['link1'],
				),
			array(
					"group" => "Image Link",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Link 2", 'worldinvestments-core' ),
					"param_name" => "link2",
					"value" => $this->translate['link2'],
				),
			array(
					"group" => "Image Link",
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"admin_label" => true,
					"heading" => __( "Link 3", 'worldinvestments-core' ),
					"param_name" => "link3",
					"value" => $this->translate['link3'],
				),
			array(
				'type' => 'css_editor',
				'heading' => __( 'Css', 'worldinvestments-core' ),
				'param_name' => 'css',
				'group' => __( 'Design options', 'worldinvestments-core' ),
				'edit_field_class' => 'vc-no-bg vc-no-border',
				)
			);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'title1'           	=> $this->translate['title1'],
			'title2'           	=> $this->translate['title2'],
			'title3'           	=> $this->translate['title3'],
			'link1'           	=> $this->translate['link1'],
			'link2'           	=> $this->translate['link2'],
			'link3'           	=> $this->translate['link3'],
			'css'             	=> '',
			), $atts ) );

		$class = vc_shortcode_custom_css_class( $css );
		
		$class_c_f = 'gd_cf_'.uniqid();

		ob_start();
		include 'views/hero-sliders.php';
		$output = ob_get_clean();
		return $output;
	}
}

new WI_VC_Hero_Slider;