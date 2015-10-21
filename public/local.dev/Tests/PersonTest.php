<?php

namespace LNK\Tests;

class PersonTest extends PHPUnit_Framework_TestCase {

	public function testEmpty() {
		$stack = array();
		$this->assertEmpty($stack);

		return $stack;
	}

}