<?php
class ProgramDay extends DataObject {
	
	private static $db = array(
		'Weekday' => 'Varchar(255)',
		'Date' => 'Varchar(255)',
		'SortOrder' => 'Int'
	);

	private static $has_many = array(
		'Items' => 'ProgramItem'
	);

	private static $default_sort = 'SortOrder';

	private static $summary_fields = array(
		'Title' => 'Title'
	);

	public function getTitle() {
		return $this->Weekday . ', ' . $this->Date;
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		//Remove SortOrder field
		$fields->removeByName('SortOrder');
		
		return $fields;
	}
	
	
}