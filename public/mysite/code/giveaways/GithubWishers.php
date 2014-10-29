<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of GithubWishers
 *
 * @author Simon 'Sphere' Erkelens
 */
class GithubWishers extends DataObject
{
	private static $db = array(
		'Emailaddress' => 'Varchar(255)',
		'Name' => 'Varchar(255)',
		'Won' => 'Boolean(false)',
	);

}