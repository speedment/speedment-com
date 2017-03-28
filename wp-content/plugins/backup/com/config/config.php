<?php
//Version
define('SG_ARCHIVE_VERSION', '5');

//Paths
define('SG_APP_PATH', realpath(dirname(__FILE__).'/../').'/');
define('SG_CONFIG_PATH', SG_APP_PATH.'config/');
define('SG_CORE_PATH', SG_APP_PATH.'core/');
define('SG_DATABASE_PATH', SG_CORE_PATH.'database/');
define('SG_LOG_PATH', SG_CORE_PATH.'log/');
define('SG_STORAGE_PATH', SG_CORE_PATH.'storage/');
define('SG_EXCEPTION_PATH', SG_CORE_PATH.'exception/');
define('SG_BACKUP_PATH', SG_CORE_PATH.'backup/');
define('SG_RESTORE_PATH', SG_CORE_PATH.'restore/');
define('SG_LIB_PATH', SG_APP_PATH.'lib/');
define('SG_MAIL_PATH', SG_CORE_PATH.'mail/');
define('SG_NOTICE_PATH', SG_CORE_PATH.'notice/');
define('SG_SCHEDULE_PATH', SG_CORE_PATH.'schedule/');

//Log
define('SG_LOG_LEVEL_ALL', 0);
define('SG_LOG_LEVEL_HIGH', 1);
define('SG_LOG_LEVEL_MEDIUM', 2);
define('SG_LOG_LEVEL_LOW', 4);
define('SG_BACKUP_LOG_POS_START', 1);
define('SG_BACKUP_LOG_POS_END', 2);

//Notice
define('SG_NOTICE_SUCCESS', 'success');
define('SG_NOTICE_WARNING', 'warning');
define('SG_NOTICE_ERROR', 'error');

//Reload methods
define('SG_RELOAD_METHOD_NONE', 'none');
define('SG_RELOAD_METHOD_STREAM', 1);
define('SG_RELOAD_METHOD_CURL', 2);
define('SG_RELOAD_METHOD_SOCKET', 3);

define('SG_SHCEDULE_STATUS_INACTIVE', 0);
define('SG_SHCEDULE_STATUS_PENDING', 1);

//Number of backups to keep on server by default
define('SG_NUMBER_OF_BACKUPS_TO_KEEP', 100);

//Backup timeout in seconds
define('SG_BACKUP_TIMEOUT', 180);

define('SG_RELOAD_TIMEOUT', 10);

//Ping data update frequency
define('SG_PING_DATE_UPDATE_FREQUENCY', 3);

//Backup file extension
define('SGBP_EXT', 'sgbp');

define('SG_BACKUP_GUARD_BANNER_URL', 'https://backup-guard.com/admin/api/v1/banners/wordpress');

define('SG_NOTICE_EXECUTION_TIMEOUT', 'timeout_error');
define('SG_NOTICE_MIGRATION_ERROR', 'migration_error');
define('SG_NOTICE_NOT_WRITABLE_ERROR', 'restore_notwritable_error');

define('SG_WORDPRESS_CORE_TABLE', SG_ENV_DB_PREFIX.'options');
define('SG_MAGENTO_CORE_TABLE', SG_ENV_DB_PREFIX.'core_config_data');

//Backup file default prefix
define('SG_BACKUP_FILE_NAME_DEFAULT_PREFIX', 'sg_backup_');

//Default folder name for storage upload
define('SG_BACKUP_DEFAULT_FOLDER_NAME', 'sg_backups');

//Schedule action name prefix
define('SG_SCHEDULE_ACTION', 'backup_guard_schedule_action');

define('SG_SCHEDULER_DEFAULT_ID', 1);

//one day in seconds
define('SG_ONE_DAY_IN_SECONDS', 24*60*60);

define('SG_ENTRY_TYPE_FILE', 1);
define('SG_ENTRY_TYPE_CDR', 2);

define('SG_STATE_ACTION_PREPARING_STATE_FILE', 1);
define('SG_STATE_ACTION_LISTING_FILES', 2);
define('SG_STATE_ACTION_COMPRESSING_FILES', 3);
define('SG_STATE_ACTION_PREPARING_UPLOAD', 4);
define('SG_STATE_ACTION_UPLOADING_BACKUP', 5);
define('SG_STATE_ACTION_RESTORING_FILES', 6);
define('SG_STATE_ACTION_EXPORTING_SQL', 7);

define('SG_STATE_TYPE_FILE', 1);
define('SG_STATE_TYPE_DB', 2);
define('SG_STATE_TYPE_UPLOAD', 3);

define('SG_TREE_FILE_NAME', 'tree.json');
define('SG_STATE_FILE_NAME', 'state.json');

define('SG_RELOADER_STATE_FILE_NAME', 'reloaderState.json');

//File name to keep upload report for email notification
define('SG_REPORT_FILE_NAME', 'report.txt');

//2GB in bytes
define('SG_ARCHIVE_MAX_SIZE_32', 2000000000);

// Backup methods
define('SG_BACKUP_METHOD_MIGRATE', 1);
define('SG_BACKUP_METHOD_STANDARD', 2);

define('SG_MIN_SUPPORTED_ARCHIVE_VERSION', 5);
define('SG_MAX_SUPPORTED_ARCHIVE_VERSION', 5);

//Reloader status
define('SG_RELOADER_STATUS_IDLE', 1);
define('SG_RELOADER_STATUS_RUNNING', 2);

//External restore
define('SG_EXTERNAL_RESTORE_FILE', 'bg_restore.php');

//License
define('SG_LICENSE_CHECK_TIMEOUT', 86400); //1 day

//Mail
define('SG_MAIL_BACKUP_SUCCESS_SUBJECT', 'Backup Succeeded');
define('SG_MAIL_BACKUP_COMPLETED_WITH_WARNINGS_SUBJECT', 'Backup completed with warnings');
define('SG_MAIL_BACKUP_FAIL_SUBJECT', 'Backup Failed');
define('SG_MAIL_BACKUP_CANCELED_SUBJECT', 'Backup Canceled');
define('SG_MAIL_RESTORE_SUCCESS_SUBJECT', 'Restore Succeeded');
define('SG_MAIL_RESTORE_FAIL_SUBJECT', 'Restore Failed');

//BackupGurad
define('SG_ACTION_STATUS_CREATED', 0);
define('SG_ACTION_STATUS_IN_PROGRESS_DB', 1);
define('SG_ACTION_STATUS_IN_PROGRESS_FILES', 2);
define('SG_ACTION_STATUS_FINISHED', 3);
define('SG_ACTION_STATUS_FINISHED_WARNINGS', 4);
define('SG_ACTION_STATUS_CANCELLING', 5);
define('SG_ACTION_STATUS_CANCELLED', 6);
define('SG_ACTION_STATUS_ERROR', 7);
define('SG_ACTION_TYPE_BACKUP', 1);
define('SG_ACTION_TYPE_RESTORE', 2);
define('SG_ACTION_TYPE_UPLOAD', 3);
define('SG_ACTION_PROGRESS_UPDATE_INTERVAL', 3); //in %
define('SG_BACKUP_DATABASE_INSERT_LIMIT', 10000);
define('SG_BACKUP_DOWNLOAD_TYPE_SGBP', 1);
define('SG_BACKUP_DOWNLOAD_TYPE_BACKUP_LOG', 2);
define('SG_BACKUP_DOWNLOAD_TYPE_RESTORE_LOG', 3);

//The following constants can be modified at run-time
define('SG_ACTION_BACKUP_FILES_AVAILABLE', 1);
define('SG_ACTION_BACKUP_DATABASE_AVAILABLE', 1);
define('SG_BACKUP_IN_BACKGROUND_MODE', 0);
define('SG_BACKUP_UPLOAD_TO_STORAGES', ''); //list of storage ids separated by commas

//Database tables
define('SG_ACTION_TABLE_NAME', SG_ENV_DB_PREFIX.'sg_action');
define('SG_CONFIG_TABLE_NAME', SG_ENV_DB_PREFIX.'sg_config');
define('SG_SCHEDULE_TABLE_NAME', SG_ENV_DB_PREFIX.'sg_schedule');
