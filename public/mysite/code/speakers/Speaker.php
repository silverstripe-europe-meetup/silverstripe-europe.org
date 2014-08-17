<?php
class Speaker extends DataObject {
	
	private static $db = array(
		'FirstName' => 'Varchar(255)',
		'LastName' => 'Varchar(255)',
		'Oneliner' => 'Varchar(255)',
		'Description' => 'HTMLText',
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Picture' => 'Image'
	);

	private static $default_sort = 'SortOrder';

	private static $summary_fields = array(
		'CMSThumbnail' => 'Picture',
		'FullName' => 'Name',
	);

	
	public function getFullName() {
		$fn = $this->FirstName;
		$ln = $this->LastName;
		
		if (strlen($ln) > 0 ) {
			return "$fn $ln";
		} else {
			return $fn;
		}
	}
	public function getTitle() {
		return $this->getFullName();
	}
	
	
	public function getCMSThumbnail(){
		$img = $this->Picture();
		if ($img && $img->exists())  {
			return $img->CMSThumbnail();
		} else {
			return "No thumbnail available";
		}
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		//Picture
		$fields->addFieldToTab("Root.Main", $pic = UploadField::create('Picture'));
		$pic->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
		$pic->setFolderName('speakers');
		
		//Remove SortOrder field
		$fields->removeByName('SortOrder');
		
		
		return $fields;
	}
	
	
}