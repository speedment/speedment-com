<?php
	// disabled for now. Will be included in later updates.
	/*if (!SGBoot::isFeatureAvailable('STORAGE')) {
		include_once(SG_NOTICE_TEMPLATES_PATH.'banner.php');
	}*/

	SGNotice::getInstance()->renderAll();
?>

<div class="sg-spinner"></div>
<div class="sg-wrapper-less">
	<div id="sg-wrapper">
