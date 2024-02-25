<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$wizors_investments_mult = wizors_investments_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120*$wizors_investments_mult ); 
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
        <?php echo '<span class="about-author">'.esc_html__('About author', 'wizors-investments'). '</span>'; ?>
		<h5 class="author_title" itemprop="name"><?php echo wp_kses_data('<span class="fn">'.get_the_author().'</span>'); ?></h5>

		<div class="author_bio" itemprop="description">
			<?php echo wp_kses_data(wpautop(get_the_author_meta( 'description' ))); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
