<?php

class SpeakerAdmin extends ModelAdmin {
	public static $menu_title = 'Speakers';
	public static $url_segment = 'speakers';

	public static $managed_models = array(
		'Speaker'
	);

	public function getEditForm($id = null, $fields = null) {
		$form = parent::getEditForm($id, $fields);

		//This check is simply to ensure you are on the managed model you want adjust accordingly
		if($this->modelClass == 'Speaker' && $gridField=$form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass))) {
			//This is just a precaution to ensure we got a GridField from dataFieldByName() which you should have
			if($gridField instanceof GridField) {
				//$gridField->getConfig()->addComponent(new GridFieldSortableRows('SortOrder'));
				$gridField->getConfig()->addComponent(new GridFieldOrderableRows('SortOrder'));
			}
		}

		return $form;
	}
}