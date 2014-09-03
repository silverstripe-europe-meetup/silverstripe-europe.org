<?php

/**
 * "Abstract" base class for Talks
 * @property string Title
 * @property int SpeakerID
 * @property Speaker Speaker
 */
class ScheduleItem extends DataObject {
	private static $db = array(
		'Title' => 'Varchar',
	);
	private static $has_one = array(
		'Speaker' => 'Speaker',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		return FieldList::create(array(
			TextField::create('Title', $this->fieldLabel('Title')),
			DropdownField::create('SpeakerID', $this->fieldLabel('Speaker'), Speaker::get()->map()->toArray())
				->setEmptyString($this->fieldLabel('NoSpeaker')),
		));
	}
}

/**
 * @property int Track
 * @property string StartTime
 * @property string EndTime
 * @property int DayID
 * @method ScheduleDay Day
 */
class ScheduleTalk extends ScheduleItem {
	private static $db = array(
		'TrackSort' => 'Int',
		'StartTime' => 'Int',
		'Length' => 'Int',
		'Content' => 'Text',
	);
	private static $has_one = array(
		'Day' => 'ScheduleDay',
	);
	private static $defaults = array(
		'Length' => '1',
	);
	private static $sort_order = 'StartTime ASC, TrackSort ASC';

	public function getCMSFields() {
		$return = parent::getCMSFields();
		$return->push(TextField::create('TrackSort'), $this->fieldLabel('TrackSort'));
		$return->push(DropdownField::create('StartTime', $this->fieldLabel('StartTime'), range(0, 24)));
		$return->push(TextField::create('Length', $this->fieldLabel('Length')));
		$return->push(TextAreaField::create('Content', $this->fieldLabel('Content')));
		return $return;
	}
}

/**
 * @method HasManyList|ScheduleLightningSession[] Talks
 */
class ScheduleLightningSession extends ScheduleTalk {
	private static $has_many = array(
		'Talks' => 'ScheduleLightningTalk',
	);

	public function getCMSFields() {
		$return = parent::getCMSFields();
		if ($this->isInDB()) {
			$return->push(GridField::create(
				'Talks',
				$this->fieldLabel('Talks'),
				$this->Talks(),
				GridFieldConfig_RecordEditor::create()
					->removeComponentsByType('GridFieldSortableHeader')
					->removeComponentsByType('GridFieldFilterHeader')
					->addComponent(new GridFieldSortableHeader())
			));
		}
		$return->removeByName('SpeakerID');
		return $return;
	}
}

/**
 * @property int SortOrder
 * @property int LightningSessionID
 * @property ScheduleLightningSession LightningSession
 */
class ScheduleLightningTalk extends ScheduleItem {
	private static $db = array(
		'SortOrder' => 'Int',
	);
	private static $has_one = array(
		'LightningSession' => 'ScheduleLightningSession',
	);
	private static $default_sort = 'SortOrder';
}