<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0.14
 */
$wizors_investments_header_video = wizors_investments_get_header_video();
if (!empty($wizors_investments_header_video) && !wizors_investments_is_from_uploads($wizors_investments_header_video)) {
	global $wp_embed;
	if (is_object($wp_embed))
		$wizors_investments_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($wizors_investments_header_video) . '[/embed]' ));
	$wizors_investments_embed_video = wizors_investments_make_video_autoplay($wizors_investments_embed_video);
	?><div id="background_video"><?php wizors_investments_show_layout($wizors_investments_embed_video); ?></div><?php
}
?>