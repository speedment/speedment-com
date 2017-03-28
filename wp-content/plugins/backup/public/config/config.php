<?php

//Paths
define('SG_PUBLIC_PATH', realpath(dirname(__FILE__).'/../').'/');
define('SG_PUBLIC_CONFIG_PATH', SG_PUBLIC_PATH.'config/');
define('SG_PUBLIC_INCLUDE_PATH', SG_PUBLIC_PATH.'include/');
define('SG_PUBLIC_MODALS_PATH', SG_PUBLIC_PATH.'include/modals/');
define('SG_PUBLIC_AJAX_PATH', SG_PUBLIC_PATH.'ajax/');

//Defines
define('SG_BACKUP_TYPE_FULL', 1);
define('SG_BACKUP_TYPE_CUSTOM', 2);
define('SG_BACKUP_MAX_FILE_UPLOAD_SIZE', 100); // in megabytes

@ini_set('upload_max_filesize',SG_BACKUP_MAX_FILE_UPLOAD_SIZE.'M');
@ini_set('post_max_size',SG_BACKUP_MAX_FILE_UPLOAD_SIZE.'M');

//Review popup states
define('SG_SHOW_REVIEW_POPUP', 1);
define('SG_NEVER_SHOW_REVIEW_POPUP', 2);

//Ajax frequency
define('SG_AJAX_DEFAULT_REQUEST_FREQUENCY', '2000'); //in miliseconds
