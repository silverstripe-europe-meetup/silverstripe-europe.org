<?php
class ProgramItem extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Description' => 'HTMLText',
		'StartTime' => 'Time',
		'EndTime' => 'Time',
		'Type' => "Enum('NA, Talk, LightningTalk, Workshop', 'NA')",
		//'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Day' => 'ProgramDay',
		'Speaker' => 'Speaker'
	);

	//private static $default_sort = 'SortOrder';
	private static $default_sort = 'StartTime';

	private static $summary_fields = array(
		'Title' => 'Title',
		'StartTime' => 'StartTime',
		'EndTime' => 'EndTime',
	);


	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		//Remove SortOrder field
		$fields->removeByName('SortOrder');
		
		
		return $fields;
	}
	
	
}