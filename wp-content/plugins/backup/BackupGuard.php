<?php
//The code that runs during plugin activation.
function activate_backup_guard() {
	//check if database should be updated
	if (backupGuardShouldUpdate()) {
		SGBoot::install();
	}
}

// The code that runs during plugin deactivation.
function uninstall_backup_guard() {
	SGBoot::uninstall();
}

function deactivate_backup_guard() {
	if (SGBoot::isFeatureAvailable('STORAGE')) {
		require_once(SG_LIB_PATH.'SGAuthClient.php');
		$res = SGAuthClient::getInstance()->logout();
	}
}

register_activation_hook(SG_BACKUP_GUARD_MAIN_FILE, 'activate_backup_guard');
register_uninstall_hook(SG_BACKUP_GUARD_MAIN_FILE, 'uninstall_backup_guard');
register_deactivation_hook(SG_BACKUP_GUARD_MAIN_FILE, 'deactivate_backup_guard');

// Register Admin Menus for single and multisite
if (is_multisite()) {
	add_action('network_admin_menu', 'backup_guard_admin_menu');
}
else {
	add_action('admin_menu', 'backup_guard_admin_menu');
}

function backup_guard_admin_menu()
{
	add_menu_page('Backups', 'BackupGuard', 'manage_options', 'backup_guard_backups', 'backup_guard_backups_page', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NjIuOSA1MDEuNCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNDYyLjkgNTAxLjQiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9IiNhMGE1YWEiIGQ9Ik00MjYuOSwxOTkuNmgtMTk4bDAuNCwzNEgyNDZoMTYyLjdjLTAuNSwzLjMtMS4xLDYuNi0xLjcsOS45Yy02LjEsMzMtMTUuMyw2Mi4yLTI3LjcsODcuNkg3OS40Yy0xMi4zLTI1LjQtMjEuNi01NC42LTI3LjctODcuNkMzOS4zLDE3Ni4xLDQ0LDExMS41LDQ3LjIsODMuN0M2Ny43LDkwLjUsODguMyw5NCwxMDguNiw5NGM2MC43LDAsMTAzLjMtMzAuMiwxMjAuOC00NS4xQzI0Ni43LDYzLjgsMjg5LjQsOTQsMzUwLjEsOTRoMGMyMC4zLDAsNDAuOS0zLjUsNjEuNC0xMC4zYzEuNiwxMy45LDMuNSwzNy4xLDMuNiw2NS4xaDIzLjdjMC00Ny40LTUuNS04MS4xLTUuOC04My4zbC0yLjQtMTQuNmwtMTMuNyw1LjZjLTIyLjQsOS4yLTQ0LjgsMTMuOC02Ni43LDEzLjhjMCwwLDAsMCwwLDBjLTY4LjMsMC0xMTEuNy00NS4zLTExMi4xLTQ1LjdsLTguNi05LjJsLTguNyw5LjJjLTAuNCwwLjUtNDMuOCw0NS43LTExMi4xLDQ1LjdjLTIxLjksMC00NC40LTQuNi02Ni43LTEzLjhsLTEzLjctNS42bC0yLjQsMTQuNmMtMC42LDMuNi0xNC40LDg4LjcsMi42LDE4MS42QzM4LjUsMzAyLjQsNTcuNSwzNDguOCw4NC44LDM4NWMzNC42LDQ1LjgsODIuNCw3NS4zLDE0Mi4xLDg3LjdsMi40LDAuNWwyLjQtMC41YzU5LjctMTIuMywxMDcuNS00MS44LDE0Mi4xLTg3LjdjMjcuNC0zNi4zLDQ2LjQtODIuNyw1Ni41LTEzNy45YzMtMTYuMiw1LTMyLjIsNi4zLTQ3LjVMNDI2LjksMTk5LjZMNDI2LjksMTk5LjZ6Ii8+PC9zdmc+', 71);
	add_submenu_page('backup_guard_backups', 'Backups', 'Backups', 'manage_options', 'backup_guard_backups', 'backup_guard_backups_page');

	if (SGBoot::isFeatureAvailable('STORAGE')) {
		add_submenu_page('backup_guard_backups', 'Cloud', 'Cloud', 'manage_options', 'backup_guard_cloud', 'backup_guard_cloud_page');
	}

	if (SGBoot::isFeatureAvailable('SCHEDULE')) {
		add_submenu_page('backup_guard_backups', 'Schedule', 'Schedule', 'manage_options', 'backup_guard_schedule', 'backup_guard_schedule_page');
	}

	add_submenu_page('backup_guard_backups', 'Settings', 'Settings', 'manage_options', 'backup_guard_settings', 'backup_guard_settings_page');
	add_submenu_page('backup_guard_backups', 'Support', 'Support', 'manage_options', 'backup_guard_support', 'backup_guard_support_page');

	//Check if should show upgrade page
	if (SGBoot::isFeatureAvailable('SHOW_UPGRADE_PAGE')) {
		add_submenu_page('backup_guard_backups', 'Why upgrade?', 'Why upgrade?', 'manage_options', 'backup_guard_pro_features', 'backup_guard_pro_features_page');
	}
}

//Pro features page
function backup_guard_pro_features_page()
{
	require_once(plugin_dir_path(__FILE__).'public/proFeatures.php');
}

//Support page
function backup_guard_support_page()
{
	if (backupGuardValidateLicense()) {
		require_once(plugin_dir_path(__FILE__).'public/support.php');
	}
}

//Backups Page
function backup_guard_backups_page(){
	if (backupGuardValidateLicense()) {
		wp_enqueue_script('backup-guard-backups-js', plugin_dir_url(__FILE__).'public/js/sgbackup.js', array('jquery', 'jquery-effects-core', 'jquery-effects-transfer'), '1.0.0', true);

		wp_enqueue_style('backup-guard-rateyo-css', plugin_dir_url(__FILE__).'public/css/jquery.rateyo.css');
		wp_enqueue_script('backup-guard-rateyo-js', plugin_dir_url(__FILE__).'public/js/jquery.rateyo.js');

		require_once(plugin_dir_path( __FILE__ ).'public/backups.php');
	}
}

//Cloud Page
function backup_guard_cloud_page()
{
	if (backupGuardValidateLicense()) {
		wp_enqueue_style('backup-guard-switch-css', plugin_dir_url(__FILE__).'public/css/bootstrap-switch.min.css');
		wp_enqueue_script('backup-guard-switch-js', plugin_dir_url(__FILE__).'public/js/bootstrap-switch.min.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('backup-guard-cloud-js', plugin_dir_url(__FILE__).'public/js/sgcloud.js', array('jquery'), '1.0.0', true);

		require_once(plugin_dir_path(__FILE__).'public/cloud.php');
	}
}

//Schedule Page
function backup_guard_schedule_page()
{
	if (backupGuardValidateLicense()) {
		wp_enqueue_style('backup-guard-switch-css', plugin_dir_url(__FILE__).'public/css/bootstrap-switch.min.css');
		wp_enqueue_script('backup-guard-switch-js', plugin_dir_url(__FILE__).'public/js/bootstrap-switch.min.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('backup-guard-schedule-js', plugin_dir_url(__FILE__).'public/js/sgschedule.js', array('jquery'), '1.0.0', true);

		require_once(plugin_dir_path( __FILE__ ).'public/schedule.php');
	}
}

//Settings Page
function backup_guard_settings_page()
{
	if (backupGuardValidateLicense()) {
		wp_enqueue_style('backup-guard-switch-css', plugin_dir_url(__FILE__).'public/css/bootstrap-switch.min.css');
		wp_enqueue_script('backup-guard-switch-js', plugin_dir_url(__FILE__).'public/js/bootstrap-switch.min.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('backup-guard-settings-js', plugin_dir_url(__FILE__).'public/js/sgsettings.js', array('jquery'), '1.0.0', true );

		require_once(plugin_dir_path(__FILE__).'public/settings.php');
	}
}

function backup_guard_login_page()
{
	wp_enqueue_script('backup-guard-login-js', plugin_dir_url(__FILE__).'public/js/sglogin.js', array('jquery'), '1.0.0', true);

	require_once(plugin_dir_path(__FILE__).'public/login.php');
}

function backup_guard_link_license_page()
{
	wp_enqueue_script('backup-guard-license-js', plugin_dir_url(__FILE__).'public/js/sglicense.js', array('jquery'), '1.0.0', true);

	require_once(plugin_dir_path(__FILE__).'public/link_license.php');
}

add_action('admin_enqueue_scripts', 'enqueue_backup_guard_scripts');
function enqueue_backup_guard_scripts($hook)
{
	if (!strpos($hook,'backup_guard')) {
		return;
	}

	wp_enqueue_style('backup-guard-spinner', plugin_dir_url(__FILE__).'public/css/spinner.css');
	wp_enqueue_style('backup-guard-wordpress', plugin_dir_url(__FILE__).'public/css/bgstyle.wordpress.css');
	wp_enqueue_style('backup-guard-less', plugin_dir_url(__FILE__).'public/css/bgstyle.less.css');
	wp_enqueue_style('backup-guard-styles', plugin_dir_url(__FILE__).'public/css/styles.css');

	echo '<script type="text/javascript">sgBackup={};';
	$sgAjaxRequestFrequency = SGConfig::get('SG_AJAX_REQUEST_FREQUENCY');
	if (!$sgAjaxRequestFrequency) {
		$sgAjaxRequestFrequency = SG_AJAX_DEFAULT_REQUEST_FREQUENCY;
	}
	echo 'SG_AJAX_REQUEST_FREQUENCY = "'.$sgAjaxRequestFrequency.'";';
	echo 'function getAjaxUrl(url) {'.
		'if (url==="cloudDropbox" || url==="cloudGdrive") return "'.admin_url('admin-post.php?action=backup_guard_').'"+url;'.
		'return "'.admin_url('admin-ajax.php').'";}</script>';

	wp_enqueue_media();
	wp_enqueue_script('backup-guard-less-framework', plugin_dir_url(__FILE__).'public/js/less.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('backup-guard-bootstrap-framework', plugin_dir_url(__FILE__).'public/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('backup-guard-sgrequest-js', plugin_dir_url(__FILE__).'public/js/sgrequesthandler.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('backup-guard-sgwprequest-js', plugin_dir_url(__FILE__).'public/js/sgrequesthandler.wordpress.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('backup-guard-main-js', plugin_dir_url(__FILE__).'public/js/main.js', array('jquery'), '1.0.0', true);
}

// adding actions to handle modal ajax requests
add_action( 'wp_ajax_backup_guard_modalManualBackup', 'backup_guard_get_manual_modal');
add_action( 'wp_ajax_backup_guard_modalImport', 'backup_guard_get_import_modal');
add_action( 'wp_ajax_backup_guard_modalFtpSettings', 'backup_guard_get_ftp_modal');
add_action( 'wp_ajax_backup_guard_modalAmazonSettings', 'backup_guard_get_amazon_modal');
add_action( 'wp_ajax_backup_guard_modalPrivacy', 'backup_guard_get_privacy_modal');
add_action( 'wp_ajax_backup_guard_modalTerms', 'backup_guard_get_terms_modal');
add_action( 'wp_ajax_backup_guard_modalReview', 'backup_guard_get_review_modal');
add_action( 'wp_ajax_backup_guard_getFileDownloadProgress', 'backup_guard_get_file_download_progress');
add_action( 'wp_ajax_backup_guard_modalCreateSchedule', 'backup_guard_create_schedule');

function backup_guard_get_file_download_progress()
{
	require_once(SG_PUBLIC_AJAX_PATH.'getFileDownloadProgress.php');
	exit();
}

function backup_guard_create_schedule()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalCreateSchedule.php');
	exit();
}

function backup_guard_get_manual_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalManualBackup.php');
	exit();
}

function backup_guard_get_import_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalImport.php');
	exit();
}

function backup_guard_get_ftp_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalFtpSettings.php');
	exit();
}

function backup_guard_get_amazon_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalAmazonSettings.php');
	exit();
}

function backup_guard_get_privacy_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalPrivacy.php');
}

function backup_guard_get_terms_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalTerms.php');
	exit();
}

function backup_guard_get_review_modal()
{
	require_once(SG_PUBLIC_AJAX_PATH.'modalReview.php');
	exit();
}

function backup_guard_register_ajax_callbacks()
{
	if (is_super_admin()) {
		// adding actions to handle ajax and post requests
		add_action('wp_ajax_backup_guard_cancelBackup', 'backup_guard_cancel_backup');
		add_action('wp_ajax_backup_guard_checkBackupCreation', 'backup_guard_check_backup_creation');
		add_action('wp_ajax_backup_guard_checkRestoreCreation', 'backup_guard_check_restore_creation');
		add_action('wp_ajax_backup_guard_cloudDropbox', 'backup_guard_cloud_dropbox');
		add_action('wp_ajax_backup_guard_cloudGdrive', 'backup_guard_cloud_gdrive');
		add_action('wp_ajax_backup_guard_cloudFtp', 'backup_guard_cloud_ftp');
		add_action('wp_ajax_backup_guard_cloudAmazon', 'backup_guard_cloud_amazon');
		add_action('wp_ajax_backup_guard_curlChecker', 'backup_guard_curl_checker');
		add_action('wp_ajax_backup_guard_deleteBackup', 'backup_guard_delete_backup');
		add_action('wp_ajax_backup_guard_getAction', 'backup_guard_get_action');
		add_action('wp_ajax_backup_guard_getRunningActions', 'backup_guard_get_running_actions');
		add_action('wp_ajax_backup_guard_importBackup', 'backup_guard_get_import_backup');
		add_action('wp_ajax_backup_guard_resetStatus', 'backup_guard_reset_status');
		add_action('wp_ajax_backup_guard_restore', 'backup_guard_restore');
		add_action('wp_ajax_backup_guard_saveCloudFolder', 'backup_guard_save_cloud_folder');
		add_action('wp_ajax_backup_guard_schedule', 'backup_guard_schedule');
		add_action('wp_ajax_backup_guard_settings', 'backup_guard_settings');
		add_action('wp_ajax_backup_guard_setReviewPopupState', 'backup_guard_set_review_popup_state');
		add_action('wp_ajax_backup_guard_sendUsageStatistics', 'backup_guard_send_usage_statistics');
		add_action('wp_ajax_backup_guard_hideNotice', 'backup_guard_hide_notice');
		add_action('wp_ajax_backup_guard_downloadFromCloud', 'backup_guard_download_from_cloud');
		add_action('wp_ajax_backup_guard_listStorage', 'backup_guard_list_storage');
		add_action('wp_ajax_backup_guard_cancelDownload', 'backup_guard_cancel_download');
		add_action('wp_ajax_backup_guard_awake', 'backup_guard_awake');
		add_action('wp_ajax_backup_guard_manualBackup', 'backup_guard_manual_backup');
		add_action('admin_post_backup_guard_downloadBackup', 'backup_guard_download_backup');
		add_action('wp_ajax_backup_guard_login', 'backup_guard_login');
		add_action('wp_ajax_backup_guard_logout', 'backup_guard_logout');
		add_action('wp_ajax_backup_guard_link_license', 'backup_guard_link_license');
	}
}

add_action('wp_ajax_nopriv_backup_guard_awake', 'backup_guard_awake_nopriv');
add_action('admin_post_backup_guard_cloudDropbox', 'backup_guard_cloud_dropbox');
add_action('admin_post_backup_guard_cloudGdrive', 'backup_guard_cloud_gdrive');
add_action('init', 'backup_guard_init');

function backup_guard_awake()
{
	require_once(SG_PUBLIC_AJAX_PATH.'awake.php');
}

function backup_guard_awake_nopriv()
{
	$token = @$_GET['token'];

	if (backupGuardValidateApiCall($token)) {
		require_once(SG_PUBLIC_AJAX_PATH.'awake.php');
	}
}

function backup_guard_cancel_download()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cancelDownload.php');
}

function backup_guard_list_storage()
{
	require_once(SG_PUBLIC_AJAX_PATH.'listStorage.php');
}

function backup_guard_download_from_cloud()
{
	require_once(SG_PUBLIC_AJAX_PATH.'downloadFromCloud.php');
}

function backup_guard_hide_notice()
{
	require_once(SG_PUBLIC_AJAX_PATH.'hideNotice.php');
}

function backup_guard_cancel_backup()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cancelBackup.php');
}

function backup_guard_check_backup_creation()
{
	require_once(SG_PUBLIC_AJAX_PATH.'checkBackupCreation.php');
}

function backup_guard_check_restore_creation()
{
	require_once(SG_PUBLIC_AJAX_PATH.'checkRestoreCreation.php');
}

function backup_guard_cloud_dropbox()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cloudDropbox.php');
}

function backup_guard_cloud_ftp()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cloudFtp.php');
}

function backup_guard_cloud_amazon()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cloudAmazon.php');
}

function backup_guard_cloud_gdrive()
{
	require_once(SG_PUBLIC_AJAX_PATH.'cloudGdrive.php');
}

function backup_guard_curl_checker()
{
	require_once(SG_PUBLIC_AJAX_PATH.'curlChecker.php');
}

function backup_guard_delete_backup()
{
	require_once(SG_PUBLIC_AJAX_PATH.'deleteBackup.php');
}

function backup_guard_download_backup()
{
	require_once(SG_PUBLIC_AJAX_PATH.'downloadBackup.php');
}

function backup_guard_get_action()
{
	require_once(SG_PUBLIC_AJAX_PATH.'getAction.php');
}

function backup_guard_get_running_actions()
{
	require_once(SG_PUBLIC_AJAX_PATH.'getRunningActions.php');
}

function backup_guard_get_import_backup()
{
	require_once(SG_PUBLIC_AJAX_PATH.'importBackup.php');
}

function backup_guard_manual_backup()
{
	require_once(SG_PUBLIC_AJAX_PATH.'manualBackup.php');
}

function backup_guard_reset_status()
{
	require_once(SG_PUBLIC_AJAX_PATH.'resetStatus.php');
}

function backup_guard_restore()
{
	require_once(SG_PUBLIC_AJAX_PATH.'restore.php');
}

function backup_guard_save_cloud_folder()
{
	require_once(SG_PUBLIC_AJAX_PATH.'saveCloudFolder.php');
}

function backup_guard_schedule()
{
	require_once(SG_PUBLIC_AJAX_PATH.'schedule.php');
}

function backup_guard_settings()
{
	require_once(SG_PUBLIC_AJAX_PATH.'settings.php');
}

function backup_guard_set_review_popup_state()
{
	require_once(SG_PUBLIC_AJAX_PATH.'setReviewPopupState.php');
}

function backup_guard_send_usage_statistics()
{
	require_once(SG_PUBLIC_AJAX_PATH.'sendUsageStatistics.php');
}

function backup_guard_login()
{
	require_once(SG_PUBLIC_AJAX_PATH.'login.php');
}

function backup_guard_logout()
{
	require_once(SG_PUBLIC_AJAX_PATH.'logout.php');
}

function backup_guard_link_license()
{
	require_once(SG_PUBLIC_AJAX_PATH.'linkLicense.php');
}

//adds once weekly to the existing schedules.
add_filter('cron_schedules', 'backup_guard_cron_add_weekly');
function backup_guard_cron_add_weekly($schedules)
{
	$schedules['weekly'] = array(
		'interval' => 60*60*24*7,
		'display' => 'Once weekly'
	);
	return $schedules;
}

//adds once monthly to the existing schedules.
add_filter('cron_schedules', 'backup_guard_cron_add_monthly');
function backup_guard_cron_add_monthly($schedules)
{
	$schedules['monthly'] = array(
		'interval' => 60*60*24*30,
		'display' => 'Once monthly'
	);
	return $schedules;
}

//adds once yearly to the existing schedules.
add_filter('cron_schedules', 'backup_guard_cron_add_yearly');
function backup_guard_cron_add_yearly($schedules)
{
	$schedules['yearly'] = array(
		'interval' => 60*60*24*30*12,
		'display' => 'Once yearly'
	);
	return $schedules;
}

function backup_guard_init()
{
	backup_guard_register_ajax_callbacks();

	//check if database should be updated
	if (backupGuardShouldUpdate()) {
		SGBoot::install();
	}

	wp_deregister_script('heartbeat');
	backupGuardSymlinksCleanup(SG_SYMLINK_PATH);
}

add_action(SG_SCHEDULE_ACTION, 'backup_guard_schedule_action', 10, 1);

function backup_guard_schedule_action($id)
{
	require_once(SG_PUBLIC_PATH.'cron/sg_backup.php');
}

//load pro plugin updater
if (SGBoot::isFeatureAvailable('STORAGE')) {
	require_once(dirname(__FILE__).'/plugin-update-checker/plugin-update-checker.php');
	require_once(SG_LIB_PATH.'SGAuthClient.php');

	$licenseKey = SGConfig::get('SG_LICENSE_KEY');

	$updateChecker = Puc_v4_Factory::buildUpdateChecker(
		BackupGuard\Config::URL.'/products/details/'.$licenseKey,
		SG_BACKUP_GUARD_MAIN_FILE,
		SG_PRODUCT_IDENTIFIER
	);

	$updateChecker->addHttpRequestArgFilter(array(
		SGAuthClient::getInstance(),
		'filterUpdateChecks'
	));
}
