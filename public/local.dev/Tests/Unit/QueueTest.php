<?php

namespace LNK\Tests\Unit;

require_once __DIR__ . DIRECTORY_SEPARATOR . '../../Classes/Queue.php';

class QueueTest extends \PHPUnit_Framework_TestCase {

	public function testEmpty() {
		$stack = array();
		$this->assertEmpty($stack);

		return $stack;
	}

	public function testInstanceQueue() {

		$queue = new \LNK\Classes\Queue();

		$mock = $this->getMockBuilder('\LNK\Classes\Person')
			->setMethods(["__construct"])
			->setConstructorArgs( array( 'Lorenzo', 'Kappeler', '01.01.1990' ) )
			->getMock();

		$queue->addPerson($mock);

		$this->assertEquals(1, $queue->count());

		return $queue;
	}

}