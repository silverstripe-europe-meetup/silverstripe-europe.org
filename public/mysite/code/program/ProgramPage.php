<?php
class ProgramPage extends Page {
	
}

class ProgramPage_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
	}
	
	public function Days() {
		return ProgramDay::get();
	}
	
}