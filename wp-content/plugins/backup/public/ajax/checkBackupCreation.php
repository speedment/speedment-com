<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');
    if(backupGuardIsAjax())
    {
        while (true)
        {
            $created = SGConfig::get('SG_RUNNING_ACTION', true);

            if ($created)
            {
                die('1');
            }
        }

        die('2');
    }
