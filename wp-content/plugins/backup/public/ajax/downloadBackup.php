<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');
    if(count($_GET))
    {
        $response = array();
        $downloadType = (int)$_GET['downloadType'];
        if($downloadType == SG_BACKUP_DOWNLOAD_TYPE_BACKUP_LOG ||
            $downloadType == SG_BACKUP_DOWNLOAD_TYPE_RESTORE_LOG ||
            $downloadType == SG_BACKUP_DOWNLOAD_TYPE_SGBP)
        {
            $backupName = $_GET['backupName'];
            try
            {
                SGBackup::download($backupName, $downloadType);
            }
            catch (SGException $exception)
            {
                die($exception->getMessage());
            }
        }
    }
