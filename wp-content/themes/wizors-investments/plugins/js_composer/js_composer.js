/* global jQuery:false */
/* global WIZORS_INVESTMENTS_STORAGE:false */

jQuery(document).on('action.ready_wizors_investments', wizors_investments_js_composer_init);
jQuery(document).on('action.init_shortcodes', wizors_investments_js_composer_init);
jQuery(document).on('action.init_hidden_elements', wizors_investments_js_composer_init);

function wizors_investments_js_composer_init(e, container) {
	"use strict";
	if (arguments.length < 2) var container = jQuery('body');
	if (container===undefined || container.length === undefined || container.length == 0) return;

	container.find('.vc_message_box_closeable:not(.inited)').addClass('inited').on('click', function(e) {
		"use strict";
		jQuery(this).fadeOut();
		e.preventDefault();
		return false;
	});
}