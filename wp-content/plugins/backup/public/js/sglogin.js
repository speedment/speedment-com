jQuery(document).ready(function() {
	jQuery('#bg-login-btn').click(function(event) {
		event.preventDefault();
		sgBackup.login();
	});
});

sgBackup.login = function()
{
	sgBackup.showAjaxSpinner('#bg-wrapper');

	jQuery('#bg-login-error').hide();

	var email = jQuery('#email').val();
	var password = jQuery('#password').val();

	var ajaxHandler = new sgRequestHandler('login', {email: email, password: password});
	ajaxHandler.callback = function(response) {
		sgBackup.hideAjaxSpinner();
		if (response == '0') {
			location.reload();
		}
		else {
			jQuery('#bg-login-error').show();
		}
	};
	ajaxHandler.run();
}
