<?php
namespace PikseraPackages\Config\tests;

use PikseraPackages\Core\tests\TestCase;

class ConfigSaveServiceProviderTest extends TestCase
{
	public function testConfigIsConfigSaveWhenUsing(){

		$this->assertInstanceOf(\PikseraPackages\Config\ConfigSave::class, app('Config'));
	}

}
