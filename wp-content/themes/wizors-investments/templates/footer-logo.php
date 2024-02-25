<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */

// Logo
if (wizors_investments_is_on(wizors_investments_get_theme_option('logo_in_footer'))) {
	$wizors_investments_logo_image = '';
	if (wizors_investments_get_retina_multiplier(2) > 1)
		$wizors_investments_logo_image = wizors_investments_get_theme_option( 'logo_footer_retina' );
	if (empty($wizors_investments_logo_image)) 
		$wizors_investments_logo_image = wizors_investments_get_theme_option( 'logo_footer' );
	$wizors_investments_logo_text   = get_bloginfo( 'name' );
	if (!empty($wizors_investments_logo_image) || !empty($wizors_investments_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($wizors_investments_logo_image)) {
					$wizors_investments_attr = wizors_investments_getimagesize($wizors_investments_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($wizors_investments_logo_image).'" class="logo_footer_image" alt="'.esc_attr__('img', 'wizors-investments').'"'.(!empty($wizors_investments_attr[3]) ? sprintf(' %s', $wizors_investments_attr[3]) : '').'></a>' ;
				} else if (!empty($wizors_investments_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($wizors_investments_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>