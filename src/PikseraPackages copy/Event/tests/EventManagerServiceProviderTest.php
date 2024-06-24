<?php
namespace PikseraPackages\Event\EventManager\tests;

use PikseraPackages\Core\tests\TestCase;

class EventManagerServiceProviderTest extends TestCase
{
	public function testIfIsEventWhenUsing(){
		$this->assertInstanceOf(\PikseraPackages\Event\Event::class, app('event_manager'));
	}
}
