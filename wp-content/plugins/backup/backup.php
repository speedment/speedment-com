<?php

/**
 * Plugin Name:       Backup
 * Plugin URI:        https://backup-guard.com/products/backup-wordpress
 * Description:       Backup for WordPress is the best backup choice for WordPress based websites or blogs.
 * Version:           1.1.35
 * Author:            BackupGuard
 * Author URI:        https://backup-guard.com/products/backup-wordpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (function_exists('activate_backup_guard')) {
	die('Please deactivate any other BackupGuard version before activating this one.');
}

define('SG_BACKUP_GUARD_VERSION', '1.1.35');
define('SG_BACKUP_GUARD_MAIN_FILE', __FILE__);

//if this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

require_once(plugin_dir_path(__FILE__).'public/boot.php');
require_once(plugin_dir_path(__FILE__).'BackupGuard.php');
