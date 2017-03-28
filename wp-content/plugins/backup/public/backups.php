<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_BACKUP_PATH.'SGBackup.php');
require_once(SG_PUBLIC_INCLUDE_PATH.'header.php');
require_once(SG_PUBLIC_INCLUDE_PATH.'sidebar.php');
$backups = SGBackup::getAllBackups();

$downloadUrl = admin_url('admin-post.php?action=backup_guard_downloadBackup&');
?>
<?php if(SGConfig::get('SG_REVIEW_POPUP_STATE') == SG_SHOW_REVIEW_POPUP): ?>
    <!--  Review Box  -->
    <a href="javascript:void(0)" id="sg-review" class="hidden" data-toggle="modal" data-modal-name="manual-review" data-remote="modalReview"></a>
    <script type="text/javascript">sgShowReview = 1;</script>
<?php endif; ?>
<div id="sg-content-wrapper">
    <div class="container-fluid">
        <fieldset>
            <legend><?php echo _backupGuardT('Backups')?><?php echo backupGuardLoggedMessage(); ?></legend>

            <a href="javascript:void(0)" id="sg-manual-backup" class="pull-left btn btn-success" data-toggle="modal" data-modal-name="manual-backup" data-remote="modalManualBackup" sg-data-backup-type="<?php echo SG_BACKUP_METHOD_STANDARD ?>"><i class="glyphicon glyphicon-play"></i> <?php _backupGuardT('Backup')?></a>

            <a href="javascript:void(0)" id="sg-backup-with-migration" class="pull-left btn btn-primary" <?php echo SGBoot::isFeatureAvailable('BACKUP_WITH_MIGRATION')?'':'disabled'?> data-toggle="modal" data-modal-name="manual-backup" data-remote="modalManualBackup" sg-data-backup-type="<?php echo SG_BACKUP_METHOD_MIGRATE ?>"><i class="glyphicon glyphicon-duplicate"></i> <?php _backupGuardT('Migrate')?></a>

             <a href="javascript:void(0)" id="sg-import" class="pull-right btn btn-primary" data-toggle="modal" data-modal-name="import"  data-remote="modalImport"><i class="glyphicon glyphicon-open"></i> <?php _backupGuardT('Import')?></a>

            <div class="clearfix"></div><br/>
            <table class="table table-striped paginated sg-backup-table">
                <thead>
                <tr>
                    <th><input type="checkbox" id="sg-checkbox-select-all" autocomplete="off"></th>
                    <th><?php _backupGuardT('Filename')?></th>
                    <th><?php _backupGuardT('Size')?></th>
                    <th><?php _backupGuardT('Date')?></th>
                    <th><?php _backupGuardT('Status')?></th>
                    <th><?php _backupGuardT('Actions')?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($backups)):?>
                    <tr>
                        <td colspan="6"><?php _backupGuardT('No backups found.')?></td>
                    </tr>
                <?php endif;?>
                <?php foreach($backups as $backup): ?>
                    <tr>
                        <td> <input type="checkbox" autocomplete="off" value="<?php echo $backup['name']?>" <?php echo $backup['active']?'disabled':''?>> </td>
                        <td><?php echo $backup['name'] ?></td>
                        <td><?php echo !$backup['active']?$backup['size']:'' ?></td>
                        <td><?php echo $backup['date'] ?></td>
                        <td id="sg-status-tabe-data-<?php echo $backup['id']?>" <?php echo $backup['active']?'data-toggle="tooltip" data-placement="top" data-original-title="" data-container="#sg-wrapper"':''?>>
                            <?php if($backup['active']):
                                    $filteredStatuses = backupGuardFilterStatusesByActionType($backup, $backup['options']);
                            ?>
                                    <input type="hidden" class="sg-active-action-id" value="<?php echo $backup['id'];?>"/>
                                    <?php foreach ($filteredStatuses as $statusCode): ?>
                                        <span class="btn-xs sg-status-icon sg-status-<?php echo $statusCode; ?>">&nbsp;</span>
                                    <?php endforeach; ?>
                                    <div class="sg-progress progress">
                                        <div class="progress-bar progress-bar-danger"></div>
                                    </div>
                            <?php else: ?>
                                    <?php if ($backup['status'] == SG_ACTION_STATUS_FINISHED_WARNINGS): ?>
                                        <span class="glyphicon glyphicon-warning-sign btn-xs text-warning" data-toggle="tooltip" data-placement="top" data-original-title="<?php if($backup['type']==SG_ACTION_TYPE_BACKUP): echo _backupGuardT('Warnings found during backup',true); elseif($backup['type']==SG_ACTION_TYPE_RESTORE): echo _backupGuardT('Warnings found during restore',true); else: echo _backupGuardT('Warnings found during upload',true); endif; ?>" data-container="#sg-wrapper"></span>
                                    <?php elseif ($backup['status'] == SG_ACTION_STATUS_ERROR): ?>
                                        <span class="glyphicon glyphicon-warning-sign btn-xs text-danger" data-toggle="tooltip" data-placement="top" data-original-title="<?php if($backup['type']==SG_ACTION_TYPE_BACKUP): echo _backupGuardT('Errors found during backup',true); elseif($backup['type']==SG_ACTION_TYPE_RESTORE): echo _backupGuardT('Errors found during restore',true); else: echo _backupGuardT('Errors found during upload',true);
                                        endif; ?>" data-container="#sg-wrapper"></span>
                                    <?php else: ?>
                                        <span class="glyphicon glyphicon-ok btn-xs text-success"></span>
                                    <?php endif;?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($backup['active']): ?>
                                <?php if($backup['type'] != SG_ACTION_TYPE_RESTORE): ?>
                                <a class="btn btn-danger btn-xs sg-cancel-backup" sg-data-backup-id="<?php echo $backup['id']?>" href="javascript:void(0)" title="<?php _backupGuardT('Stop')?>">&nbsp;<i class="glyphicon glyphicon-stop" aria-hidden="true"></i>&nbsp;</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="javascript:void(0)" data-sgbackup-name="<?php echo $backup['name'];?>" data-remote="deleteBackup" class="btn btn-danger btn-xs sg-remove-backup" title="<?php _backupGuardT('Delete')?>">&nbsp;<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>&nbsp;</a>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false" title="<?php _backupGuardT('Download')?>">
                                        &nbsp;<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>&nbsp;
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if($backup['files']):?>
                                            <li>
                                                <a href="<?php echo $downloadUrl.'backupName='.@$backup['name'].'&downloadType='.SG_BACKUP_DOWNLOAD_TYPE_SGBP ?>">
                                                    <i class="glyphicon glyphicon-hdd" aria-hidden="true"></i> <?php _backupGuardT('Backup')?>
                                                </a>
                                            </li>
                                        <?php endif;?>
                                        <?php if($backup['backup_log']):?>
                                            <li>
                                                <a href="<?php echo $downloadUrl.'backupName='.@$backup['name'].'&downloadType='.SG_BACKUP_DOWNLOAD_TYPE_BACKUP_LOG ?>">
                                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <?php _backupGuardT('Backup log')?>
                                                </a>
                                            </li>
                                        <?php endif;?>
                                        <?php if($backup['restore_log']):?>
                                            <li>
                                                <a href="<?php echo $downloadUrl.'backupName='.@$backup['name'].'&downloadType='.SG_BACKUP_DOWNLOAD_TYPE_RESTORE_LOG ?>">
                                                    <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i> <?php _backupGuardT('Restore log')?>
                                                </a>
                                            </li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                                <?php if(file_exists(SG_BACKUP_DIRECTORY.$backup['name'].'/'.$backup['name'].'.sgbp')):?>
                                    <a href="javascript:void(0)" title="<?php _backupGuardT('Restore')?>" class="btn btn-success btn-xs sg-restore" data-restore-name="<?php echo $backup['name']?>">
                                        &nbsp;<i class="glyphicon glyphicon-repeat" aria-hidden="true"></i>&nbsp;
                                    </a>
                                <?php endif;?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <button id="sg-delete-multi-backups" class="pull-left btn btn-danger"><?php _backupGuardT('Delete')?></button>

            <div class="text-right">
                <ul class="pagination"></ul>
            </div>
        </fieldset>
    </div>
    <?php require_once(SG_PUBLIC_INCLUDE_PATH.'/footer.php'); ?>
</div>
<div class="clearfix"></div>
