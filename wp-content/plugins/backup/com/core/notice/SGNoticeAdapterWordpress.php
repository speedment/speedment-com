<?php
require_once(dirname(__FILE__).'/SGINoticeAdapter.php');

class SGNoticeAdapterWordpress implements SGINoticeAdapter
{
	protected $notices = array();

	public function __construct()
	{
		$this->notices = array(
			SG_NOTICE_SUCCESS => array(),
			SG_NOTICE_WARNING => array(),
			SG_NOTICE_ERROR => array()
		);
	}

	public function addNotice($notice, $type, $dismissible = false, $id = '')
	{
		$this->notices[$type][] = array(
			'message' => $notice,
			'dismissible' => $dismissible,
			'id' => $id
		);
	}

	public function addNoticeFromTemplate($template, $type, $dismissible = false)
	{
		$path = SG_NOTICE_TEMPLATES_PATH.$template.'.php';

		ob_start();
		@include($path);
		$content = ob_get_clean();

		$this->addNotice($content, $type, $dismissible, $template);
	}

	public function renderAll()
	{
		foreach ($this->notices as $type => $notices) {
			foreach ($notices as $notice) {
				$class = 'notice notice-'.$type;
				if ($notice['dismissible']) {
					$class .= ' is-dismissible';
				}
				echo '<div data-notice-id="'.$notice['id'].'" class="'.$class.'"><p>'.$notice['message'].'</p></div>';
			}
		}

	}
}
