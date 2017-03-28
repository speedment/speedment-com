<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');
    if(isset($_POST['backupName']))
    {
        $backupName = $_POST['backupName'];
        for ($i=0; $i < count($backupName) ; $i++) {
        	SGBackup::deleteBackup($backupName[$i]);
    	}
    }
    die('{"success":1}');
