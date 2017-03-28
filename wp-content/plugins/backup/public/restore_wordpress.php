<?php
#SG_DYNAMIC_DEFINES#

//validate key
if (@$_GET['k'] != BG_RESTORE_KEY) {
	die('Invalid key');
}

define('WP_CONTENT_DIR', ABSPATH.'wp-content');
define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
define('SG_APP_ROOT_DIRECTORY', ABSPATH);
define('SG_ENV_WORDPRESS', 'Wordpress');
define('SG_ENV_ADAPTER', SG_ENV_WORDPRESS);
define('SG_DB_ADAPTER', SG_ENV_ADAPTER);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('BG_EXTERNAL_RESTORE_RUNNING', true);

error_reporting(0);
ini_set('display_errors', 0);

//check if BackupGuard plugin exists
$pluginPath = WP_PLUGIN_DIR.'/'.SG_PLUGIN_NAME.'/com/config/';
if (!file_exists($pluginPath.'config.php')) {
	die('Plugin not found');
}

$action = @$_GET['action'];

if ($action == 'finalize') { //finalize action needs WordPress functions to work
	require_once(ABSPATH.'wp-load.php');
	require_once(ABSPATH.'wp-admin/includes/plugin.php');
	$action = 'finalize'; //for some reason $action gets reseted to null

	//activate current BackupGuard plugin
	//because maybe it was inactive at the time when the backup was made
	//for example: the backup was made with the free version, the restore with pro
	$proPluginFile = SG_PLUGIN_NAME.'/backup-guard-pro.php';
	$freePluginFile = SG_PLUGIN_NAME.'/backup.php';
	if (file_exists(WP_PLUGIN_DIR.'/'.$proPluginFile)) {
		activate_plugin($proPluginFile);
	}
	else if (file_exists(WP_PLUGIN_DIR.'/'.$freePluginFile)) {
		activate_plugin($freePluginFile);
	}
}
else {
	//require anything we need for only wpdb to run
	require_once(ABSPATH.'wp-includes/version.php');
	require_once(ABSPATH.'wp-includes/formatting.php');
	require_once(ABSPATH.'wp-includes/plugin.php');
	require_once(ABSPATH.'wp-includes/class-wp-error.php');

	//starting from WordPress 4.7.1 is_wp_error() has been moved to another location
	//wpdb needs it, so we create it here
	if (!function_exists('is_wp_error')) {
		function is_wp_error($thing) {
			return ($thing instanceof WP_Error);
		}
	}

	require_once(ABSPATH.'wp-includes/wp-db.php');
	global $wpdb;
	$wpdb = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
	$wpdb->db_connect();
}

//the mysql version is needed for the charset handler
define('SG_MYSQL_VERSION', $wpdb->db_version());

$dbCharset = 'utf8';
if (@constant("DB_CHARSET")) {
	$dbCharset = DB_CHARSET;
}
define('SG_DB_CHARSET', $dbCharset);

//require BackupGuard plugin
if (file_exists($pluginPath.'config.wordpress.pro.php')) {
	require_once($pluginPath.'config.wordpress.pro.php');
}
else if (file_exists($pluginPath.'config.wordpress.free.php')) {
	require_once($pluginPath.'config.wordpress.free.php');
}
require_once($pluginPath.'config.php');
require_once(SG_CORE_PATH.'SGBoot.php');

//prcoess awake action (restore)
if ($action == 'awake') {
	require_once(SG_LIB_PATH.'SGReloader.php');
	SGReloader::awake();
	die;
}

//process getAction action (get restore progress)
if ($action == 'getAction') {
	require_once(SG_BACKUP_PATH.'SGBackup.php');
	$currentAction = SGBackup::getAction(SG_ACTION_ID);
	if ($currentAction) {
		if ($currentAction['status'] == SG_ACTION_STATUS_CREATED ||
			$currentAction['status'] == SG_ACTION_STATUS_IN_PROGRESS_FILES ||
			$currentAction['status'] == SG_ACTION_STATUS_IN_PROGRESS_DB) {
			if (!SGPing::ping()) {
				$backup = new SGBackup();
				$backup->handleExecutionTimeout(SG_ACTION_ID);
				$currentAction = SGBackup::getAction(SG_ACTION_ID);
			}
			die(json_encode($currentAction));
		}
		else if ($currentAction['status'] == SG_ACTION_STATUS_FINISHED ||
			$currentAction['status'] == SG_ACTION_STATUS_FINISHED_WARNINGS) {
			die('1');
		}
		die('0');
	}
	die('0');
}

//finalize restoration
if ($action == 'finalize') {
	require_once(SG_BACKUP_PATH.'SGBackup.php');
	$backup = new SGBackup();
	$backup->finalizeExternalRestore(SG_ACTION_ID);
	die;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo SG_PUBLIC_URL; ?>css/spinner.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SG_PUBLIC_URL; ?>css/bgstyle.less.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SG_PUBLIC_URL; ?>css/main.css">
	<style>
	body {
		background-color: #fff;
		padding: 0;
		margin: 0;
	}
	.sg-box-center {
		width: 400px;
		position: absolute;
		left: 50%;
		margin-left: -200px;
		margin-top: 100px;
		border: 1px solid #5c5c5c;
	}
	.sg-logo {
		text-align: center;
		padding: 20px 0;
		background-color: #333;
	}
	.sg-wrapper-less .sg-progress {
		height: 4px;
		margin: 1px 0 0;
	}
	.sg-progress-box p {
		margin-top: 10px;
		text-align: center;
	}
	</style>
</head>
<body>
	<div class="sg-wrapper-less">
		<div class="sg-wrapper">
			<div class="sg-box-center">
				<div class="sg-logo">
					<img width="172px" src="<?php echo SG_PUBLIC_URL; ?>img/sglogo.png">
				</div>
				<div class="sg-progress-box">
					<p>Restoring <span id="progressItem">files</span>: <span id="progressTxt">0%</span></p>
					<p class="text-warning"><small>NOTE: Please don't close your browser until finished.</small></p>
					<div class="sg-progress progress">
						<div id="progressBar" class="progress-bar progress-bar-danger" style="width: 0%;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	function bgRunAjax(url, responseHandler, params) {
		var req;
		if (window.XMLHttpRequest) {
			req = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			req = new ActiveXObject("Microsoft.XMLHTTP");
		}
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				if (req.status < 400) {
					responseHandler(req, params);
				}
			}
		};
		req.open("POST", url, true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.send(params);
	}

	function bgUpdateProgress(progress) {
		var progressInPercents = progress+'%';
		var progressBar = document.getElementById('progressBar');
		progressBar.style.width = progressInPercents;
		var progressTxt = document.getElementById('progressTxt');
		progressTxt.innerHTML = progressInPercents;
	}

	var awakeRunning = false;
	function awake() {
		if (awakeRunning) return;
		awakeRunning = true;
		bgRunAjax("<?php echo BG_RESTORE_URL; ?>&action=awake", function() {
			awakeRunning = false;
		}, "");
	}

	var getActionRunning = false;
	function getAction() {
		if (getActionRunning) return;
		getActionRunning = true;
		bgRunAjax("<?php echo BG_RESTORE_URL; ?>&action=getAction", function(response) {
			try {
				var response = eval('('+response.responseText+')');
				if (response === 1) {
					clearInterval(getActionTimer);
					clearInterval(awakeTimer);
					bgRunAjax("<?php echo BG_RESTORE_URL; ?>&action=finalize", function(response) {
						bgUpdateProgress(100);
						location.href = '<?php echo BG_PLUGIN_URL; ?>';
					}, "");
					return;
				}
				else if (response === 0) {
					clearInterval(getActionTimer);
					clearInterval(awakeTimer);
					bgUpdateProgress(100);
					location.href = '<?php echo BG_PLUGIN_URL; ?>';
					return;
				}
				else if (typeof response === 'object') {
					bgUpdateProgress(response.progress);
					if (response.status==<?php echo SG_ACTION_STATUS_IN_PROGRESS_FILES; ?>) {
						progressItem.innerHTML = 'files';
					}
					else {
						progressItem.innerHTML = 'database';
					}
				}
			} catch (e) {}

			getActionRunning = false;
		}, "");
	}

	//awake
	var awakeTimer = setInterval(function() {
		awake();
	}, 3000);
	awake();

	//get action (for progress)
	var getActionTimer = setInterval(function() {
		getAction();
	}, 4000);
	getAction();
	</script>
</body>
</html>
