<?php

require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_LIB_PATH.'SGReloader.php');

@session_write_close();

SGReloader::awake();
exit();
