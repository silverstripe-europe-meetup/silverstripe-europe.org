<?php

/**
 * @property string Date
 * @method HasManyList|ScheduleTalk[] Talks
 */
class ScheduleDay extends DataObject {
	private static $db = array(
		'Date' => 'Date',
	);
	private static $has_one = array(
		'SchedulePage' => 'SchedulePage',
	);
	private static $has_many = array(
		'Talks' => 'ScheduleTalk',
	);
	private static $default_sort = 'Date';
	private static $summary_fields = array(
		'Title'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$return = FieldList::create(array(
			DateField::create('Date', $this->fieldLabel('Date'))->setConfig('showcalendar', true),
		));
		if ($this->isInDB()) {
			$return->push(GridField::create(
				'Talks',
				$this->fieldLabel('Talks'),
				$this->Talks(),
				GridFieldConfig_RecordEditor::create()
					->removeComponentsByType('GridFieldAddNewButton')
					->addComponent(new GridFieldAddNewMultiClass())
			));
		}
		return $return;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->Date ? $this->obj('Date')->format('l Y-m-d') : parent::getTitle();
	}

	public function getTalkList() {
		$list = array();
		$talks = $this->Talks()->toArray();
		$start = $talks[0]->StartTime;
		$end = $start + $talks[0]->Length;
		foreach ($talks as $talk) {
			$newEnd = $talk->StartTime + $talk->Length - 1;
			if ($end < $newEnd) {
				$end = $newEnd;
			}
		}
		foreach (range($start, $end) as $time) {
			$list[$time] = ArrayData::create(array(
				'Time' => number_format($time, 2, ':', ''),
				'Tracks' => ArrayList::create(),
				'Colspan' => 1,
				'RowspanCols' => 0,
			));
			if ($time == 9) {
				// hackfix for welcome, didn't thought we have a 30min slot
				$list[$time]->Time = '09:30';
			}
		}
		$totalCols = 0;
		foreach ($talks as $talk) {
			$time = $talk->StartTime;
			$list[$time]->Tracks->push($talk);
			for ($i = 1; $i < $talk->Length; $i++) {
				$list[$time + $i]->RowspanCols++;
			}
			$cols = $list[$time]->Tracks->count() + $list[$time]->RowspanCols;
			if ($cols > $totalCols) {
				$totalCols = $cols;
			}
		}
		foreach ($list as $row) {
			for ($i = $row->Tracks->count() + $row->RowspanCols; $i < $totalCols; $i++) {
				$row->Colspan++;
			}
		}
//		$count = count($talks);
//		if ($count) {
//			$start = $talks[0]->StartTime;
//			$end = $start + $talks[0]->Length;
//			foreach ($talks as $talk) {
//				if ($end < ($talk->StartTime + $talk->Length)) {
//					$end = $talk->StartTime + $talk->Length;
//				}
//			}
//			for ($i = $start; $i <= $end; $i++) {
//
//				$list[] = ArrayData::create(array(
//					'Time' => number_format($i, 2, ':'),
//					'Tracks' => '',
//				));
//			}
//
//		}
//		$start = $talks->First()->StartTime
//		$last = ;
//		$end = $talks->Last()->StartTime;
//
//		for ($i = 0; $i < 24; $i++) {
//			$list
//		}
		return ArrayList::create($list);
	}
}