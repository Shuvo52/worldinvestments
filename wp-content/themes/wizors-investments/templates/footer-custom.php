<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */

$wizors_investments_footer_scheme =  wizors_investments_is_inherit(wizors_investments_get_theme_option('footer_scheme')) ? wizors_investments_get_theme_option('color_scheme') : wizors_investments_get_theme_option('footer_scheme');
$wizors_investments_footer_id = str_replace('footer-custom-', '', wizors_investments_get_theme_option("footer_style"));
if ((int) $wizors_investments_footer_id == 0) {
    $wizors_investments_footer_id = wizors_investments_get_post_id(array(
                                                'name' => $wizors_investments_footer_id,
                                                'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
                                                )
                                            );
} else {
    $wizors_investments_footer_id = apply_filters('trx_addons_filter_get_translated_layout', $wizors_investments_footer_id);
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($wizors_investments_footer_id); ?> scheme_<?php echo esc_attr($wizors_investments_footer_scheme); ?>">
	<?php
    // Custom footer's layout
    do_action('wizors_investments_action_show_layout', $wizors_investments_footer_id);
	?>
</footer><!-- /.footer_wrap -->
