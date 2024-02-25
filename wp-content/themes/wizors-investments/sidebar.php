<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

$wizors_investments_sidebar_position = wizors_investments_get_theme_option('sidebar_position');
if (wizors_investments_sidebar_present()) {
	ob_start();
	$wizors_investments_sidebar_name = wizors_investments_get_theme_option('sidebar_widgets');
	wizors_investments_storage_set('current_sidebar', 'sidebar');

    if ( is_active_sidebar( $wizors_investments_sidebar_name ) ) {
        dynamic_sidebar( $wizors_investments_sidebar_name );
    }
	$wizors_investments_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($wizors_investments_out)) != '') {
		?>
		<div class="sidebar <?php echo esc_attr($wizors_investments_sidebar_position); ?> widget_area<?php if (!wizors_investments_is_inherit(wizors_investments_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(wizors_investments_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'wizors_investments_action_before_sidebar' );
				wizors_investments_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $wizors_investments_out));
				do_action( 'wizors_investments_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>