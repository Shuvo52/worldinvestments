<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.10
 */

// Copyright area
$wizors_investments_footer_scheme =  wizors_investments_is_inherit(wizors_investments_get_theme_option('footer_scheme')) ? wizors_investments_get_theme_option('color_scheme') : wizors_investments_get_theme_option('footer_scheme');
$wizors_investments_copyright_scheme = wizors_investments_is_inherit(wizors_investments_get_theme_option('copyright_scheme')) ? $wizors_investments_footer_scheme : wizors_investments_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($wizors_investments_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				// Replace {{...}} and [[...]] on the <i>...</i> and <b>...</b>
				$wizors_investments_copyright = wizors_investments_prepare_macros(wizors_investments_get_theme_option('copyright'));
				if (!empty($wizors_investments_copyright)) {
					// Replace {date_format} on the current date in the specified format
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $wizors_investments_copyright, $wizors_investments_matches)) {
						$wizors_investments_copyright = str_replace($wizors_investments_matches[1], date(str_replace(array('{', '}'), '', $wizors_investments_matches[1])), $wizors_investments_copyright);
					}
					// Display copyright
					echo wp_kses_data(nl2br($wizors_investments_copyright));
				}
			?></div>
		</div>
	</div>
</div>
