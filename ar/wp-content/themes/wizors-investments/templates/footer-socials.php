<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */


// Socials
if ( wizors_investments_is_on(wizors_investments_get_theme_option('socials_in_footer')) && ($wizors_investments_output = wizors_investments_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php wizors_investments_show_layout($wizors_investments_output); ?>
		</div>
	</div>
	<?php
}
?>