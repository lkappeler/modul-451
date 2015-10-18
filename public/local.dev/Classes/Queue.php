<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Netcase GmbH
 *  Created by Lorenzo Kappeler <lorenzo.kappeler@netcase.ch>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace LNK\Classes;


class Queue {

	/**
	 * @var array
	 */
	private $persons = array();

	/**
	 * @param \LNK\Classes\Person $person
	 */
	public function addPerson(\LNK\Classes\Person $person) {

		array_push($this->persons, $person);
	}

	/**
	 * @return \LNK\Classes\Person
	 */
	public function getNextPerson() {

		return array_shift($this->persons);
	}

	public function count() {

		return count($this->persons);
	}
}