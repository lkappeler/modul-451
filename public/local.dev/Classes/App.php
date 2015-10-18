<?php

namespace LNK\Classes;
require __DIR__.DIRECTORY_SEPARATOR.'../smarty/libs/Smarty.class.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Queue.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'Person.php';

class App {

	private $queue = NULL;

	function __construct() {
		//Restore queue object from session or init empty one
		$this->queue = (!isset($_SESSION['queue']) ? new Queue() : unserialize($_SESSION['queue']));
		$this->main();
	}

	private function main() {

		// Init Template Engine
		$smarty = new \Smarty;

		//Switch App Actions TODO: Add Property Mapping
		if (isset($_POST['action'])) {

			switch ( $_POST['action'] ) {
				case 'getNextPerson':
					$smarty->assign("nextPerson", $this->getNextPerson());
					break;
				case 'addPerson':
					$this->addPerson($_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth']);
					break;
			}
		}

		$smarty->assign("queueCountText", "Personen in der Warteschlange: ");
		$smarty->assign("queueCount", $this->queue->count());

		//Template Engine Cache Configuration
		$smarty->force_compile = true;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->cache_lifetime = 120;

		//Add Page variables
		$smarty->assign("headline", "Software Testing", true);
		$smarty->assign('copyright', '&copy; <a href="http://lnk.codes" target="_blank" >LNK</a> - Modul 451 Testing');
		$smarty->assign("thxTo", 'THX to:');
		$smarty->assign("thxToLinks",
			array(
				"https://www.vagrantup.com/",
				"https://www.chef.io/",
				"https://github.com/r8/vagrant-lamp",
				"http://www.smarty.net",
				"http://html5up.net/",
				"https://jenkins-ci.org/"
			)
		);

		$smarty->assign("manyMore", '& many more');

		//Store Queue Object in Session
		$_SESSION['queue'] = serialize($this->queue);

		//Render Page with the Smarty Template engine
		$smarty->display('index.html');
	}

	private function addPerson($firstName, $lastName, $dateOfBirth) {

		//TODO: Add Validation
		$newPerson = new Person($firstName, $lastName, $dateOfBirth);
		$this->queue->addPerson($newPerson);
	}

	private function getNextPerson() {
		$nextPerson = $this->queue->getNextPerson();

		$nextPersonArray = array(
			'firstName' => $nextPerson->getFirstName(),
			'lastName' => $nextPerson->getLastName(),
			'dateOfBirth' => $nextPerson->getDateOfBirth()
		);

		return $nextPersonArray;
	}
}