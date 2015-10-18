<?php

namespace LNK\Classes;


class Person {

	/**
	 * @var string $firstName
	 */
	protected $firstName = '';

	/**
	 * @var string $lastName
	 */
	protected $lastName = '';

	/**
	 * @var \DateTime $firstName
	 */
	protected $dateOfBirth = 0;

	/**
	 * @param $firstName
	 * @param $lastName
	 * @param $dateOfBirth
	 */
	function __construct($firstName, $lastName, $dateOfBirth) {

		$this->setFirstName($firstName);
		$this->setLastName($lastName);
		$this->setDateOfBirth($dateOfBirth);
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}

	/**
	 * @param \DateTime $dateOfBirth
	 */
	public function setDateOfBirth($dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}
}