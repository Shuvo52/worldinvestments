<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */

// Footer menu
$wizors_investments_menu_footer = wizors_investments_get_nav_menu('menu_footer');
if (!empty($wizors_investments_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php wizors_investments_show_layout($wizors_investments_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>