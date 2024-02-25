<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage WIZORS_INVESTMENTS
 * @since WIZORS_INVESTMENTS 1.0
 */

						// Widgets area inside page content
						wizors_investments_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					wizors_investments_create_widgets_area('widgets_below_page');

					$wizors_investments_body_style = wizors_investments_get_theme_option('body_style');
					if ($wizors_investments_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$wizors_investments_footer_style = wizors_investments_get_theme_option("footer_style");
			if (strpos($wizors_investments_footer_style, 'footer-custom-')===0) $wizors_investments_footer_style = 'footer-custom';
			get_template_part( "templates/{$wizors_investments_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (wizors_investments_is_on(wizors_investments_get_theme_option('debug_mode')) && wizors_investments_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(wizors_investments_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "97143372000", // WhatsApp number
            call_to_action: "", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<div class="main-icon">
<div class="inner-mic"><a class="icon-1 tooltip" href="https://www.youtube.com/channel/UCiRR734bCr35Ibjn2FLfDMQ"><span class="tooltiptext">Youtube</span><i class="fab fa-youtube"></i></a></div>
<div class="inner-mic"><a class="icon-2 tooltip" href="https://www.facebook.com/winvestments.ae"><span class="tooltiptext">Facebook</span><i class="fab fa-facebook-f"></i></a></div>
<div class="inner-mic"><a class="icon-3 tooltip" href="https://www.linkedin.com/in/world-investments-marketing/"><span class="tooltiptext">LinkedIn</span><i class="fab fa-linkedin-in"></i></a></div>
<div class="inner-mic"><a class="icon-4 tooltip" href="https://www.instagram.com/worldinvestments.ae/"><span class="tooltiptext">Instagram</span><i class="fab fa-instagram"></i></a></div>
<div class="inner-mic"><a class="icon-5 tooltip" href="contacts/"><span class="tooltiptext">Contact Us</span><i class="fas fa-phone"></i></a></div>
<div class="inner-mic"><a class="icon-6 tooltip" href="gallery/"><span class="tooltiptext">Gallery</span><i class="fas fa-images"></i></a></div>
<div class="inner-mic"><a class="icon-7 tooltip" href="careers/"><span class="tooltiptext">Careers</span><i class="fas fa-user-graduate"></i></a></div>
<div class="inner-mic"><a class="icon-8 tooltip" href="https://worldinvestments.ae/ar/category/blog/"><span class="tooltiptext">Blogs</span><i class="fas fa-blog"></i></a></div>

</div>
<script>

	  /*
Turn Visual Composer Image Carousel into Visual Composer Infinite Image Carousel
Include before the </head> tag on yout theme's header.php 
Read the detailed step-by-step at https://humbertosilva.com/visual-composer-infinite-image-carousel/
*/

// auxiliary code to create triggers for the add and remove class for later use
(function($){
$.each(["addClass","removeClass"],function(i,methodname){
    var oldmethod = $.fn[methodname];
    $.fn[methodname] = function(){
          oldmethod.apply( this, arguments );
          this.trigger(methodname+"change");
          return this;
    }
});
})(jQuery);

// main function for the infinite loop
function vc_custominfiniteloop_init(vc_cil_element_id){

  var vc_element = '#' + vc_cil_element_id; // because we're using this more than once let's create a variable for it
  window.maxItens = jQuery(vc_element).data('per-view'); // max visible items defined
  window.addedItens = 0; // auxiliary counter for added itens to the end 

  // go to slides and duplicate them to the end to fill space
  jQuery(vc_element).find('.vc_carousel-slideline-inner').find('.vc_item').each(function(){
    // we only need to duplicate the first visible images
    if (window.addedItens < window.maxItens) {
      if (window.addedItens == 0 ) {
        // the fisrt added slide will need a trigger so we know it ended and make it "restart" without animation
        jQuery(this).clone().addClass('vc_custominfiniteloop_restart').removeClass('vc_active').appendTo(jQuery(this).parent());            
      } else {
        jQuery(this).clone().removeClass('vc_active').appendTo(jQuery(this).parent());         
      }
      window.addedItens++;
    }
  });

  // add the trigger so we know when to "restart" the animation without the user knowing about it
  jQuery('.vc_custominfiniteloop_restart').bind('addClasschange', null, function(){

    // navigate to the carousel element , I know, its ugly ...
    var vc_carousel = jQuery(this).parent().parent().parent().parent();

    // first we temporarily change the animation speed to zero
    jQuery(vc_carousel).data('vc.carousel').transition_speed = 0;

    // make the slider go to the first slide without animation and because the fist set of images shown
    // are the same that are being shown now the slider is now "restarted" without that being visible 
    jQuery(vc_carousel).data('vc.carousel').to(0);

    // allow the carousel to go to the first image and restore the original speed 
    setTimeout("vc_cil_restore_transition_speed('"+jQuery(vc_carousel).prop('id')+"')",100);
  });

}

// restore original speed setting of vc_carousel
function vc_cil_restore_transition_speed(element_id){
// after inspecting the original source code the value of 600 is defined there so we put back the original here
jQuery('#' + element_id).data('vc.carousel').transition_speed = 600; 
}

// init     
jQuery(document).ready(function(){    
  // find all vc_carousel with the defined class and turn them into infine loop
  jQuery('.vc_custominfiniteloop').find('div[data-ride="vc_carousel"]').each(function(){
    // allow time for the slider to be built on the page
    // because the slider is "long" we can wait a bit before adding images and events needed  
    var vc_cil_element = jQuery(this).prop("id");
    setTimeout("vc_custominfiniteloop_init('"+vc_cil_element+"')",2000);      
  });    
});
</script>
<script>
	jQuery(window).on('resize', function() {
    if (jQuery('header').width()<768) {
        jQuery( ".rs-comeup" ).insertBefore( ".rs-goesdown" );
    }
});
jQuery('input[placeholder="Search"]').attr('placeholder', 'بحث');	
	
		jQuery( "header.top_panel.top_panel_custom .sc_content_container .vc_row.wpb_row.vc_inner.vc_row-fluid.vc_row-o-equal-height.vc_row-o-content-middle.vc_row-flex .wpb_column.vc_column_container.vc_col-sm-4.vc_hidden-sm.vc_hidden-xs.sc_layouts_column.sc_layouts_column_align_right.sc_layouts_column_icons_position_left .vc_column-inner .wpb_wrapper a").last().after("<a class='langchane' href='https://worldinvestments.ae/'>ENGLISH</a>");
	jQuery('header.top_panel.top_panel_custom .sc_content_container .vc_row.wpb_row.vc_inner.vc_row-fluid.vc_row-o-equal-height.vc_row-o-content-middle.vc_row-flex .wpb_column.vc_column_container.vc_col-sm-4.vc_hidden-sm.vc_hidden-xs.sc_layouts_column.sc_layouts_column_align_right.sc_layouts_column_icons_position_left .vc_column-inner .wpb_wrapper a').last().before("<br class='lang-nav'>");
	jQuery('header.top_panel.top_panel_custom .sc_content_container .vc_row.wpb_row.vc_inner.vc_row-fluid.vc_row-o-equal-height.vc_row-o-content-middle.vc_row-flex .wpb_column.vc_column_container.vc_col-sm-4.vc_hidden-sm.vc_hidden-xs.sc_layouts_column.sc_layouts_column_align_right.sc_layouts_column_icons_position_left .vc_column-inner .wpb_wrapper a').last().before("<div class='vc_empty_space  height_small lang-nav' style='height: 32px'><span class='vc_empty_space_inner'></span></div>");
	</script>

	</body>
</html>