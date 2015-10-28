<?php

namespace LNK\Tests;

require_once __DIR__.DIRECTORY_SEPARATOR.'../Classes/Person.php';

class PersonTest extends \PHPUnit_Framework_TestCase {

	public function testEmpty() {
		$stack = array();
		$this->assertEmpty($stack);

		return $stack;
	}

	public function testInstancePerson() {

		$person = new \LNK\Classes\Person('Hans', 'Muster', '01-01-1970');

		$this->assertEquals('Hans', $person->getFirstName());
		$this->assertEquals('Muster', $person->getLastName());
		$this->assertEquals('01-01-1970', $person->getDateOfBirth());

		return $person;
	}

	public function testSetterAndGetter() {

		$person = new \LNK\Classes\Person('Hans', 'Muster', '01-01-1970');

		$person->setFirstName('Fidel');
		$person->setLastName('Castro');
		$person->setDateOfBirth(new \DateTime(13-06-1926));

		$this->assertEquals('Fidel', $person->getFirstName());
		$this->assertEquals('Castro', $person->getLastName());
		$this->assertEquals(new \DateTime(13-06-1926), $person->getDateOfBirth());

		return $person;
	}

}