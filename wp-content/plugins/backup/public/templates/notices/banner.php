<?php
	$res = backupGuardGetBanner(SG_BACKUP_GUARD_BANNER_URL);
?>

<div id = "sg-banner" >
	<div id = "sg-left-column">
		<ul>
			<li class = "hvr-bounce-in"><img class="sg-img-class" src="<?echo SG_PUBLIC_URL?>img/user-manual.png"><a onclick = 'sgBackup.openInNewTab("https://backup-guard.com/products/backup-wordpress/doc")'>User Manual</a></li>
			<li class = "hvr-bounce-in"><img class="sg-img-class" src="<?echo SG_PUBLIC_URL?>img/full-demo.png"><a onclick = 'sgBackup.openInNewTab("https://backup-guard.com/wordpress/wp-login.php")'>Full Demo</a></li>
			<li class = "hvr-bounce-in"><img class="sg-img-class" src="<?echo SG_PUBLIC_URL?>img/FAQ.png"><a onclick = 'sgBackup.openInNewTab("https://backup-guard.com/products/backup-wordpress/faq")'>FAQ</a></li>
			<li class = "hvr-bounce-in"><img class="sg-img-class" src="<?echo SG_PUBLIC_URL?>img/contact-us.png"><a onclick = 'sgBackup.openInNewTab("https://backup-guard.com/products/backup-wordpress/support")'>Contact US</a></li>
		</ul>
	</div>

	<div id = "sg-centre-column">
		<?php if (strlen($res) == 0):?>
			<p>You're running the Free version of the plugin. If you're interested in website migration, backup to cloud, scheduled backups, mail notifications, don't wait to buy BackupGuard Pro <b>NOW!</b></p>
			<p>
				<button id = "sg-buy-now" onclick = 'sgBackup.openInNewTab("https://backup-guard.com/products/backup-wordpress#pricing")'><img class="sg-img-class" src="<?echo SG_PUBLIC_URL?>img/cart.png">&nbsp;<span id = "sg-buy-now-text">$9.95* | BUY NOW</span></button><br>
				<span id = "sg-banner-clarification">*Silver package | Lifetime linces</span>
			</p>
			<p>
				<!-- <img src="<?echo SG_PUBLIC_URL?>img/2CO.png"> -->
			</p>
		<?php else:?>
		<?php echo $res; ?>
		<?php endif;?>
	</div>

	<div id = "sg-right-column">
		<ul>
			<li id = "sg-logo"></li>
			<li id = ""></span></li>
			<li id = "sg-social-buttons">
				<button class="sg-banner-social-button" id = "sg-facebook" onclick = 'sgBackup.openInNewTab("https://www.facebook.com/backupguard/?fref=ts")'></button>
				<button class="sg-banner-social-button" id = "sg-twitter" onclick = 'sgBackup.openInNewTab("https://twitter.com/backupguard")'></button>
				<button class="sg-banner-social-button" id = "sg-google-plus" onclick = 'sgBackup.openInNewTab("https://plus.google.com/118362709330885027766")'></button>
				<button class="sg-banner-social-button" id = "sg-youtube" onclick = 'sgBackup.openInNewTab("https://www.youtube.com/channel/UCZhNYAcWl0VKHevWeakOvwQ")'></button>
			</li>
			<br>
			<li id = "sg-rate-us">
				<div id = "sg-banner-test">
				<label class = "sg-banner-rate-us-in">Rate Us</label>
				<a class = "sg-banner-rate-us-in" href="<?php echo SG_REVIEW_URL;?>"><div id = "rateYo"></div><a>
				</div>
			</li>
		</ul>
	</div>
</div>
