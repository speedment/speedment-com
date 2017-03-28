<?php
function _backupGuardT($key, $return = false)
{
    if($return)
    {
        return $key;
    }
    else
    {
        echo $key;
    }
}

function backupGuardIsAjax()
{
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
}

function selectElement($data, $attributes=array(), $firstOption='', $selectedKey='')
{
    $attrString = '';
    foreach($attributes as $attributeKey=>$attributeValue)
    {
        $attrString.= " ".$attributeKey.'="'.$attributeValue.'"';

    }
    $select = '<select'.$attrString.'>';
    if ($firstOption) {
        $select.='<option value="0">'.$firstOption.'</option>';
    }
    foreach($data as $key=>$val)
    {
        $selected = $selectedKey==$key?' selected="selected"':'';
        $select.='<option value="'.$key.'"'.$selected.'>'.$val.'</option>';
    }
    $select.='</select>';
    return $select;
}

function backupGuardParseBackupOptions($options)
{

    $scheduleOptions = array(
        'interval' => '',
        'dayOfInterval' => '',
        'intervalHour' => '',
        'isBackgroundMode' => false,
        'isDatabaseSelected' => false,
        'isFilesSelected' => false,
        'isCustomBackup' => false,
        'selectedDirectories' => array(),
        'excludeDirectories' => array(),
        'selectedClouds' => array(),
        'label' => ''
    );

    if (isset($options['schedule_options'])) {
        $scheduleExecutionOptions = json_decode($options['schedule_options'], true);

        $scheduleOptions['interval'] = $scheduleExecutionOptions['interval'];
        $scheduleOptions['dayOfInterval'] = $scheduleExecutionOptions['dayOfInterval'];
        $scheduleOptions['intervalHour'] = $scheduleExecutionOptions['intervalHour'];
    }

    if (isset($options['backup_options'])) {

        $backupOptions = json_decode($options['backup_options'], true);

        $scheduleOptions['isBackgroundMode'] = $backupOptions['SG_BACKUP_IN_BACKGROUND_MODE']?true:false;
        $scheduleOptions['isDatabaseSelected'] = $backupOptions['SG_ACTION_BACKUP_DATABASE_AVAILABLE']?true:false;
        $scheduleOptions['isFilesSelected'] = $backupOptions['SG_ACTION_BACKUP_FILES_AVAILABLE']?true:false;
        $backupType = $backupOptions['SG_BACKUP_TYPE'];

        $scheduleOptions['isCustomBackup'] = $backupType==SG_BACKUP_TYPE_FULL?false:true;

        if ($scheduleOptions['isCustomBackup']) {
            $scheduleOptions['selectedDirectories'] = explode(',', $backupOptions['SG_BACKUP_FILE_PATHS']);
            if ($scheduleOptions['isFilesSelected']) {
                $scheduleOptions['excludeDirectories'] = explode(',', $backupOptions['SG_BACKUP_FILE_PATHS_EXCLUDE']);
            }
        }

        if (strlen($backupOptions['SG_BACKUP_UPLOAD_TO_STORAGES'])) {
            $scheduleOptions['selectedClouds'] = explode(',', $backupOptions['SG_BACKUP_UPLOAD_TO_STORAGES']);
        }
    }

    if (isset($options['label'])) {
        $scheduleOptions['label'] = $options['label'];
    }

    return $scheduleOptions;
}

function backupGuardFilterStatusesByActionType($currentBackup, $currentOptions)
{
    $filteredStatuses = array();
    if($currentBackup['type'] == SG_ACTION_TYPE_RESTORE)
    {
        $filteredStatuses[] = SG_ACTION_TYPE_RESTORE.SG_ACTION_STATUS_IN_PROGRESS_FILES;
        $filteredStatuses[] = SG_ACTION_TYPE_RESTORE.SG_ACTION_STATUS_IN_PROGRESS_DB;
    }
    else
    {
        $currentOptions = backupGuardActiveOptionToType($currentOptions);
        if ($currentOptions['backupDatabase']) $filteredStatuses[] = $currentOptions['backupDatabase'];
        if ($currentOptions['backupFiles']) $filteredStatuses[] = $currentOptions['backupFiles'];
        if ($currentOptions['ftp']) $filteredStatuses[] = $currentOptions['ftp'];
        if ($currentOptions['dropbox']) $filteredStatuses[] = $currentOptions['dropbox'];
        if ($currentOptions['gdrive']) $filteredStatuses[] = $currentOptions['gdrive'];
        if ($currentOptions['amazon']) $filteredStatuses[] = $currentOptions['amazon'];
    }
    return $filteredStatuses;
}

function backupGuardActiveOptionToType($activeOption)
{
    $activeOption = json_decode($activeOption, true);
    $activeOptions['backupDatabase'] = !empty($activeOption['SG_ACTION_BACKUP_DATABASE_AVAILABLE'])?SG_ACTION_STATUS_IN_PROGRESS_DB:0;
    $activeOptions['backupFiles'] = !empty($activeOption['SG_ACTION_BACKUP_FILES_AVAILABLE'])?SG_ACTION_STATUS_IN_PROGRESS_FILES:0;

    $storages = explode(',', @$activeOption['SG_BACKUP_UPLOAD_TO_STORAGES']);
    $activeOptions['ftp'] = 0;
    $activeOptions['dropbox'] = 0;
    $activeOptions['gdrive'] = 0;
    $activeOptions['amazon'] = 0;
    foreach ($storages as $key => $storage) {
        switch ($storage) {
            case SG_STORAGE_FTP:
                $activeOptions['ftp'] = SG_ACTION_TYPE_UPLOAD.SG_STORAGE_FTP;
                break;
            case SG_STORAGE_DROPBOX:
                $activeOptions['dropbox'] = SG_ACTION_TYPE_UPLOAD.SG_STORAGE_DROPBOX;
                break;
            case SG_STORAGE_GOOGLE_DRIVE:
                $activeOptions['gdrive'] = SG_ACTION_TYPE_UPLOAD.SG_STORAGE_GOOGLE_DRIVE;
                break;
            case SG_STORAGE_AMAZON:
                $activeOptions['amazon'] = SG_ACTION_TYPE_UPLOAD.SG_STORAGE_AMAZON;
                break;
        }
    }

    return $activeOptions;
}

function backupGuardConvertToBytes($from){
    $number=substr($from,0,-2);
    switch(strtoupper(substr($from,-2))){
        case "KB":
            return $number*1024;
        case "MB":
            return $number*pow(1024,2);
        case "GB":
            return $number*pow(1024,3);
        case "TB":
            return $number*pow(1024,4);
        case "PB":
            return $number*pow(1024,5);
        default:
            return $from;
    }
}

function backupGuardGetRunningActions()
{
    $runningActions = SGBackup::getRunningActions();
    $isAnyActiveActions = count($runningActions);
    if($isAnyActiveActions) {
        return $runningActions;
    }
    return false;
}

function backupGuardShouldUpdate()
{
    $shouldUpdateDB = false;

    $currentVersion = SG_BACKUP_GUARD_VERSION;
    $oldVersion = SGConfig::get('SG_BACKUP_GUARD_VERSION', true);

    if ($currentVersion !== $oldVersion) {
        $shouldUpdateDB = true;
    }

    return $shouldUpdateDB;
}

function backupGuardLoggedMessage()
{
    if (!SGBoot::isFeatureAvailable('SCHEDULE')) {
        return '';
    }

    $user = SGConfig::get('SG_LOGGED_USER');
    if (!$user) {
        return '';
    }

    $user = unserialize($user);
    if (!$user || empty($user['firstname'])) {
        return '';
    }

    $html = '<span class="bg-logged-msg-container">';
    $html .= 'Welcome, <b>'.$user['firstname'].'</b>! ';
    $html .= '(<a href="javascript:void(0)" onclick="sgBackup.logout()">Log Out</a>)</span>';
    return $html;
}
