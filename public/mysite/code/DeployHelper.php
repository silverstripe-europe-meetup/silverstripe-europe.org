<?php
class DeployHelper extends Controller {
	
	public function init() {
		parent::init();
	}
	
	
	public function index() {
		
		$triggerDir = str_replace('public','',Director::baseFolder()) . 'temp';
		
		$triggerFile = $triggerDir . '/dodeploy';
		
		//echo $triggerFile;
		
		shell_exec("mkdir -p $triggerDir");
		shell_exec("touch $triggerFile");
		
		echo 'initiated deployment';
	}
}