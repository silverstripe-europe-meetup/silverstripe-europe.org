<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of JetbrainsWishers
 *
 * @author Simon 'Sphere' Erkelens
 */
class JetbrainsWishers extends DataObject
{
	private static $db = array(
		'Emailaddress' => 'Varchar(255)',
		'Name' => 'Varchar(255)',
		'Won' => 'Boolean(false)',
	);

}