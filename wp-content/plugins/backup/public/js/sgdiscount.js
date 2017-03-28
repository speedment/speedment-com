
jQuery(document).ready( function() {
	url = getAjaxUrl();
	url += 'hideDisconutNotice';

	jQuery('.notice-dismiss').on('click', function(){
		if (jQuery(this).parent().attr('which-notice') == 'backup-guard-discount-div') {
			jQuery.ajax({
				url: url
			});
		}
	})
});
