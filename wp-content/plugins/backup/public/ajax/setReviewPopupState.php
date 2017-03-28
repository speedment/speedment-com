<?php
    require_once(dirname(__FILE__).'/../boot.php');
    if(backupGuardIsAjax() && count($_POST))
    {
        $state = (int)$_POST['reviewState'];
        SGConfig::set('SG_REVIEW_POPUP_STATE', $state);
        die('0');
    }
