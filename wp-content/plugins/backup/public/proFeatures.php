<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_PUBLIC_INCLUDE_PATH . 'header.php');
require_once(SG_PUBLIC_INCLUDE_PATH . 'sidebar.php');
?>
<div id="sg-content-wrapper">
	<div class="sg-wrap-container">
		<iframe id="sg-backup-guard-iframe" src="<?php echo SG_BACKUP_UPGRADE_URL?>"></iframe>
	</div>
	<?php require_once(SG_PUBLIC_INCLUDE_PATH . 'footer.php'); ?>
</div>
