<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_args = get_query_var('wizors_investments_logo_args');

// Site logo
$wizors_investments_logo_image  = wizors_investments_get_logo_image(isset($wizors_investments_args['type']) ? $wizors_investments_args['type'] : '');
$wizors_investments_logo_text   = wizors_investments_is_on(wizors_investments_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$wizors_investments_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($wizors_investments_logo_image) || !empty($wizors_investments_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($wizors_investments_logo_image)) {
			$wizors_investments_attr = wizors_investments_getimagesize($wizors_investments_logo_image);
			echo '<img src="'.esc_url($wizors_investments_logo_image).'" alt="'.esc_attr__('img', 'wizors-investments').'"'.(!empty($wizors_investments_attr[3]) ? sprintf(' %s', $wizors_investments_attr[3]) : '').'>' ;
		} else {
			wizors_investments_show_layout(wizors_investments_prepare_macros($wizors_investments_logo_text), '<span class="logo_text">', '</span>');
			wizors_investments_show_layout(wizors_investments_prepare_macros($wizors_investments_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>