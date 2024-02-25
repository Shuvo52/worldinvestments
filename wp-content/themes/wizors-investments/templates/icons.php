<?php
/**
 * The template to displaying popup with Theme Icons
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_icons = wizors_investments_get_list_icons();
if (is_array($wizors_investments_icons)) {
	?>
	<div class="wizors_investments_list_icons">
		<?php
		foreach($wizors_investments_icons as $icon) {
			?><span class="<?php echo esc_attr($icon); ?>" title="<?php echo esc_attr($icon); ?>"></span><?php
		}
		?>
	</div>
	<?php
}
?>