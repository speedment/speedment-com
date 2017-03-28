<?php

interface SGINoticeAdapter
{
	public function addNotice($notice, $type);
	public function addNoticeFromTemplate($template, $type);
	public function renderAll();
}
