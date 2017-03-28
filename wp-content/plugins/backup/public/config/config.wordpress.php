<?php
require_once(dirname(__FILE__).'/config.php');

//Plugin's directory name
define('SG_PLUGIN_NAME', basename(dirname(SG_PUBLIC_PATH)));

//Urls
define('SG_PUBLIC_URL', plugins_url().'/'.SG_PLUGIN_NAME.'/public/');
define('SG_PUBLIC_AJAX_URL', SG_PUBLIC_URL.'ajax/');
define('SG_PUBLIC_BACKUPS_URL', network_admin_url('admin.php?page=backup_guard_backups'));
define('SG_PUBLIC_CLOUD_URL', network_admin_url('admin.php?page=backup_guard_cloud'));
define('SG_REVIEW_URL', 'https://wordpress.org/support/view/plugin-reviews/backup?filter=5');

//BackupGuard Site URL
define('SG_BACKUP_SITE_URL', 'https://backup-guard.com/products/backup-wordpress');

define('SG_BACKUP_UPGRADE_URL', 'https://backup-guard.com/products/backup-wordpress/0');

//BackupGuard Support URL
define('SG_BACKUP_SUPPORT_URL', 'https://backup-guard.com/tickets/index.php?faq=0');

define('SG_BACKUP_SITE_PRICING_URL', 'https://backup-guard.com/products/backup-wordpress#pricing');

define('SG_BACKUP_ADMIN_LOGIN_URL', 'https://backup-guard.com/admin');
