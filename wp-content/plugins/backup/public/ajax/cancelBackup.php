<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');

    if(backupGuardIsAjax() && isset($_POST['actionId']))
    {
        $actionId = (int)$_POST['actionId'];
        SGBackup::cancelAction($actionId);
        die('{"success":1}');
    }
