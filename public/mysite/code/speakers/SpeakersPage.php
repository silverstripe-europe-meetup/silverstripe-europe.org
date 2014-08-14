<?php
class SpeakersPage extends Page {
	
}

class SpeakersPage_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
	}
	
	public function Speakers() {
		return Speaker::get();
	}
	
}