<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

// Header sidebar
$wizors_investments_header_name = wizors_investments_get_theme_option('header_widgets');
$wizors_investments_header_present = !wizors_investments_is_off($wizors_investments_header_name) && is_active_sidebar($wizors_investments_header_name);
if ($wizors_investments_header_present) { 
	wizors_investments_storage_set('current_sidebar', 'header');
	$wizors_investments_header_wide = wizors_investments_get_theme_option('header_wide');
	ob_start();

    if ( is_active_sidebar( $wizors_investments_header_name ) ) {
        dynamic_sidebar( $wizors_investments_header_name );
    }
	$wizors_investments_widgets_output = ob_get_contents();
	ob_end_clean();
	if (trim(strip_tags($wizors_investments_widgets_output)) != '') {
		$wizors_investments_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $wizors_investments_widgets_output);
		$wizors_investments_need_columns = strpos($wizors_investments_widgets_output, 'columns_wrap')===false;
		if ($wizors_investments_need_columns) {
			$wizors_investments_columns = max(0, (int) wizors_investments_get_theme_option('header_columns'));
			if ($wizors_investments_columns == 0) $wizors_investments_columns = min(6, max(1, substr_count($wizors_investments_widgets_output, '<aside ')));
			if ($wizors_investments_columns > 1)
				$wizors_investments_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($wizors_investments_columns).' widget ', $wizors_investments_widgets_output);
			else
				$wizors_investments_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($wizors_investments_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$wizors_investments_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($wizors_investments_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'wizors_investments_action_before_sidebar' );
				wizors_investments_show_layout($wizors_investments_widgets_output);
				do_action( 'wizors_investments_action_after_sidebar' );
				if ($wizors_investments_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$wizors_investments_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>