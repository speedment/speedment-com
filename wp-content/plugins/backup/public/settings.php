<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_PUBLIC_INCLUDE_PATH . '/header.php');
$isNotificationEnabled = SGConfig::get('SG_NOTIFICATIONS_ENABLED');
$userEmail = SGConfig::get('SG_NOTIFICATIONS_EMAIL_ADDRESS');
$isDeleteBackupAfterUploadEnabled = SGConfig::get('SG_DELETE_BACKUP_AFTER_UPLOAD');
$isReloadingsEnabled = SGConfig::get('SG_BACKUP_WITH_RELOADINGS');
$intervalSelectElement = array(
                            '1000'=>'1 second',
                            '2000'=>'2 seconds',
                            '3000'=>'3 seconds',
                            '5000'=>'5 seconds',
                            '7000'=>'7 seconds',
                            '10000'=>'10 seconds');
$selectedInterval = (int)SGConfig::get('SG_AJAX_REQUEST_FREQUENCY')?(int)SGConfig::get('SG_AJAX_REQUEST_FREQUENCY'):SG_AJAX_DEFAULT_REQUEST_FREQUENCY;

$backupFileNamePrefix = SGConfig::get('SG_BACKUP_FILE_NAME_PREFIX')?SGConfig::get('SG_BACKUP_FILE_NAME_PREFIX'):SG_BACKUP_FILE_NAME_DEFAULT_PREFIX;
$backupFileNamePrefix = htmlspecialchars($backupFileNamePrefix, ENT_QUOTES);

?>
<?php require_once(SG_PUBLIC_INCLUDE_PATH . 'sidebar.php'); ?>
    <div id="sg-content-wrapper">
        <div class="container-fluid">
            <div class="row sg-settings-container">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" data-sgform="ajax" data-type="sgsettings">
                        <fieldset>
                            <legend><?php echo _backupGuardT('General settings')?><?php echo backupGuardLoggedMessage(); ?></legend>
                            <?php if(SGBoot::isFeatureAvailable('NOTIFICATIONS')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label sg-user-info">
                                        <?php echo _backupGuardT('Email notifications');
                                        if(!empty($userEmail)): ?>
                                            <br/><span class="text-muted sg-user-email sg-helper-block"><?php echo $userEmail; ?></span>
                                        <?php endif?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="sgIsEmailNotification" class="sg-switch sg-email-switch" <?php echo $isNotificationEnabled?'checked="checked"':''?> data-remote="settings">
                                        </label>
                                    </div>
                                </div>
                                <div class="sg-general-settings">
                                    <div class="form-group">
                                        <label class="col-md-4 sg-control-label" for="sg-email"><?php echo _backupGuardT('Enter email')?></label>
                                        <div class="col-md-8">
                                            <input id="sg-email" name="sgUserEmail" type="email" placeholder="example@domain.com" class="form-control input-md" value="<?php echo @$userEmail?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="col-md-8 sg-control-label">
                                    <?php echo _backupGuardT('Reloads enabled'); ?>
                                </label>
                                <div class="col-md-3 pull-right text-right">
                                    <label class="sg-switch-container">
                                        <input type="checkbox" name="backup-with-reloadings" class="sg-switch" <?php echo $isReloadingsEnabled?'checked="checked"':''?>>
                                    </label>
                                </div>
                            </div>
                            <?php if(SGBoot::isFeatureAvailable('DELETE_LOCAL_BACKUP_AFTER_UPLOAD')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php echo _backupGuardT('Delete local backup after upload'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="delete-backup-after-upload" class="sg-switch" <?php echo $isDeleteBackupAfterUploadEnabled?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(SGBoot::isFeatureAvailable('NUMBER_OF_BACKUPS_TO_KEEP')): ?>
                                <div class="form-group">
                                    <label class="col-md-5 sg-control-label" for='amount-of-backups-to-keep'><?php echo _backupGuardT("Backup retention")?></label>
                                    <div class="col-md-5 pull-right text-right">
                                        <input class="form-control" id='amount-of-backups-to-keep' name='amount-of-backups-to-keep' type="text" value="<?php echo (int)SGConfig::get('SG_AMOUNT_OF_BACKUPS_TO_KEEP')?(int)SGConfig::get('SG_AMOUNT_OF_BACKUPS_TO_KEEP'):SG_NUMBER_OF_BACKUPS_TO_KEEP?>">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if(SGBoot::isFeatureAvailable('CUSTOM_BACKUP_NAME')): ?>
                                <div class="form-group">
                                    <label class="col-md-5 sg-control-label"><?php echo _backupGuardT('Backup file name')?></label>
                                    <div class="col-md-5 pull-right text-right">
                                        <input id="backup-file-name" name="backup-file-name" type="text" class="form-control input-md" value="<?php echo $backupFileNamePrefix?>">
                                    </div>
                                </div>

                            <?php endif; ?>
                            <div class="form-group">
                                <label class="col-md-7 sg-control-label" for="sg-email"><?php echo _backupGuardT('AJAX request frequency')?></label>
                                <div class="col-md-5">
                                    <?php echo selectElement($intervalSelectElement, array('id'=>'sg-ajax-interval', 'name'=>'ajaxInterval', 'class'=>'form-control'), '', $selectedInterval);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5"><?php echo _backupGuardT('Backup destination path'); ?></label>
                                <div class="col-md-6 pull-right text-right">
                                    <span><?php echo str_replace(realpath(SG_APP_ROOT_DIRECTORY).'/', "" ,realpath(SG_BACKUP_DIRECTORY)); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="button1id"></label>
                                <div class="col-md-8">
                                    <button type="button" id="sg-save-settings" class="btn btn-success pull-right" onclick="sgBackup.sgsettings();"><?php _backupGuardT('Save')?></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once(SG_PUBLIC_INCLUDE_PATH . '/footer.php'); ?>
    </div>
