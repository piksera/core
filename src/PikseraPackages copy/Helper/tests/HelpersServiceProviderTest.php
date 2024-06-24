<?php
namespace PikseraPackages\Helper\tests;

use PikseraPackages\Core\tests\TestCase;

class HelpersServiceProviderTest extends TestCase
{
	public function testFormatWhenUsing(){

		$this->assertInstanceOf(\PikseraPackages\Helper\Format::class, app('format'));
	}

	public function testXSSSecurityWhenUsing(){

		$this->assertInstanceOf(\PikseraPackages\Helper\XSSSecurity::class, app('xss_security'));
	}

}
