<?php
    require_once(dirname(__FILE__).'/../boot.php');
    require_once(SG_BACKUP_PATH.'SGBackup.php');

    $error = array();
    $success = array('success'=>1);
    try
    {
        SGBackup::upload(@$_FILES['sgbpFile']);
    }
    catch (SGException $exception)
    {
        array_push($error, $exception->getMessage());
        die(json_encode($error));
    }
    die(json_encode($success));