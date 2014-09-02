<?php

/**
 * @method HasManyList|ScheduleDay[] Days
 */
class SchedulePage extends Page {
	private static $has_many = array(
		'Days' => 'ScheduleDay',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$return = parent::getCMSFields();
		$return->addFieldToTab('Root', Tab::create('Days', $this->fieldLabel('Days')));
		$return->addFieldToTab('Root.Days', GridField::create(
			'Days',
			$this->fieldLabel('Days'),
			$this->Days(),
			GridFieldConfig_RecordEditor::create()
		));
		return $return;
	}
}

/**
 * @property SchedulePage dataRecord
 * @method SchedulePage data
 */
class SchedulePage_Controller extends Page_Controller {
}