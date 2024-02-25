<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */

// Footer sidebar
$wizors_investments_footer_name = wizors_investments_get_theme_option('footer_widgets');
$wizors_investments_footer_present = !wizors_investments_is_off($wizors_investments_footer_name) && is_active_sidebar($wizors_investments_footer_name);
if ($wizors_investments_footer_present) { 
	wizors_investments_storage_set('current_sidebar', 'footer');
	$wizors_investments_footer_wide = wizors_investments_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar( $wizors_investments_footer_name ) ) {
        dynamic_sidebar( $wizors_investments_footer_name );
    }
	$wizors_investments_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($wizors_investments_out)) != '') {
		$wizors_investments_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $wizors_investments_out);
		$wizors_investments_need_columns = true;
		if ($wizors_investments_need_columns) {
			$wizors_investments_columns = max(0, (int) wizors_investments_get_theme_option('footer_columns'));
			if ($wizors_investments_columns == 0) $wizors_investments_columns = min(6, max(1, substr_count($wizors_investments_out, '<aside ')));
			if ($wizors_investments_columns > 1)
				$wizors_investments_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($wizors_investments_columns).' widget ', $wizors_investments_out);
			else
				$wizors_investments_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($wizors_investments_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$wizors_investments_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($wizors_investments_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'wizors_investments_action_before_sidebar' );
				wizors_investments_show_layout($wizors_investments_out);
				do_action( 'wizors_investments_action_after_sidebar' );
				if ($wizors_investments_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$wizors_investments_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>