<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of WinnerPage
 *
 * @author Simon 'Sphere' Erkelens
 */
class WinnerPage extends Page
{
	//put your code here

}
class WinnerPage_Controller extends Page_Controller
{
	protected $Jetbrains; // Jetbrains winners
	protected $Github; // Github winners

	public function init()
	{
		parent::init();
		$this->Jetbrains = JetbrainsWishers::get()->filter(array('Won' => true));
		if ($this->Jetbrains->count() < 5) {
			$winOptions = SubmittedFormField::get()
				->filterAny(array('Name' => 'EditableDropdown15'))
				->exclude(array('Value' => 'GitHub Micro License'));
			foreach ($winOptions as $option) {
				$this->findOrCreateWinner($option, JetbrainsWishers::create());
			}
			while ($this->Jetbrains->count() < 5) {
				$winner = JetbrainsWishers::get()
					->filter(array('Won' => false))
					->limit(1)
					->sort('RAND()')
					->first();
				$winner->Won = true;
				$winner->write();
				$this->Jetbrains = JetbrainsWishers::get()->filter(array('Won' => true));
			}
		}
		$this->Jetbrains = JetbrainsWishers::get()->filter(array('Won' => true))->limit(4);
		$this->Github = GithubWishers::get()->filter(array('Won' => true));
		if(!$this->Github->count()) {
			$winOptions = SubmittedFormField::get()
				->filterAny(array('Name' => 'EditableDropdown15'))
				->exclude(array('Value' => 'JetBrains PHPStorm license'));
			foreach ($winOptions as $option) {
				if($option->Value != "No, I'm good" && $option->Value != null) {
					$this->findOrCreateWinner($option, GithubWishers::create());
				}
			}
		}
		$this->Github = GithubWishers::get()->filter(array('Won' => true));
	}

	private function findOrCreateWinner($option, $type)
	{
		$winnerMail = SubmittedFormField::get()->filter(array('Parent.ID' => $option->Parent()->ID, 'Name' => 'EditableEmailField2'))->first();
		$winnerName = SubmittedFormField::get()->filter(array('Parent.ID' => $option->Parent()->ID, 'Name' => 'EditableTextField1'))->first();
		if(!$type::get()->filter(array('Emailaddress' => $winnerMail->Value))->count()) {
			$type->Emailaddress = $winnerMail->Value;
			$type->Name = $winnerName->Value;
			$type->write();
		}
	}

}