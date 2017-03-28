<?php
	$page = $_GET['page'];
?>
<div id="sg-sidebar-wrapper" class="metro">
	<nav class="sidebar dark">
		<ul>
			<li class="title"><a class="sg-site-url" target="_blank" href="<?php echo SG_BACKUP_SITE_URL;?>"></a></li>
			<li class="<?php echo strpos($page,'backups')?'active':''?>"><a href="<?php echo network_admin_url('admin.php?page=backup_guard_backups'); ?>"><span class="glyphicon glyphicon-hdd"></span>Backups</a></li>
			<li class="<?php echo strpos($page,'settings')?'active':''?>"><a href="<?php echo network_admin_url('admin.php?page=backup_guard_settings'); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Settings</a></li>
			<li class="<?php echo strpos($page,'support')?'active':''?>">
				<a href="<?php echo network_admin_url('admin.php?page=backup_guard_support'); ?>">
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Support</a>
			</li>
			<li class="<?php echo strpos($page,'pro_features')?'active':''?>">
				<a href="<?php echo network_admin_url('admin.php?page=backup_guard_pro_features'); ?>">
					<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Why upgrade?</a>
			</li>
		</ul>
	</nav>
	<div class="sg-alert-pro">
		<p><?php _backupGuardT('Website migration, Backup to cloud, automatization, mail notifications, and more in our PRO package!'); ?></p>
		<p><a class="btn btn-primary" target="_blank" href="<?php echo SG_BACKUP_SITE_URL; ?>"><?php _backupGuardT('Buy now!'); ?></a></p>
	</div>
</div>
