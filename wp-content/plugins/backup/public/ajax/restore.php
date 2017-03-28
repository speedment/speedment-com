<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');
    if(backupGuardIsAjax() && count($_POST))
    {
        $error = array();
        try
        {
            //Getting Backup Name
            $backupName = $_POST['bname'];
            $backup = new SGBackup();
            $backup->restore($backupName);
        }
        catch(SGException $exception)
        {
            array_push($error, $exception->getMessage());
            die(json_encode($error));
        }
    }
