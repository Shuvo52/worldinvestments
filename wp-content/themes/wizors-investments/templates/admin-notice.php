<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.1
 */
?>
<div class="update-nag" id="wizors_investments_admin_notice">
	<h3 class="wizors_investments_notice_title"><?php echo sprintf(esc_html__('Welcome to %s', 'wizors-investments'), wp_get_theme()->name); ?></h3>
	<?php
	if (!wizors_investments_exists_trx_addons()) {
		?><p><?php echo wp_kses_data(__('<b>Attention!</b> Plugin "ThemeREX Addons is required! Please, install and activate it!', 'wizors-investments')); ?></p><?php
	}
	?><p><?php
		if (wizors_investments_get_value_gp('page')!='tgmpa-install-plugins') {
			?>
			<a href="<?php echo esc_url(admin_url().'themes.php?page=tgmpa-install-plugins'); ?>" class="button-primary"><i class="dashicons dashicons-admin-plugins"></i> <?php esc_html_e('Install plugins', 'wizors-investments'); ?></a>
			<?php
		}
		if (function_exists('wizors_investments_exists_trx_addons') && wizors_investments_exists_trx_addons()) {
			?>
			<a href="<?php echo esc_url(admin_url().'themes.php?page=trx_importer'); ?>" class="button-primary"><i class="dashicons dashicons-download"></i> <?php esc_html_e('One Click Demo Data', 'wizors-investments'); ?></a>
			<?php
		}
		?>
        <a href="<?php echo esc_url(admin_url().'customize.php'); ?>" class="button-primary"><i class="dashicons dashicons-admin-appearance"></i> <?php esc_html_e('Theme Customizer', 'wizors-investments'); ?></a>
        <a href="#" class="button wizors_investments_hide_notice"><i class="dashicons dashicons-dismiss"></i> <?php esc_html_e('Hide Notice', 'wizors-investments'); ?></a>
	</p>
</div>