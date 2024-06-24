<?php
namespace PikseraPackages\Config\tests;

use Illuminate\Support\Facades\Config;
use PikseraPackages\Config\ConfigSave;
use PikseraPackages\Core\tests\TestCase;

class ConfigSaveTest extends TestCase
{
    public function testSimple()
    {
        Config::set('piksera.firstName', 'Bozhidar');
        Config::set('piksera.lastName', 'Slaveykov');

        Config::save(['piksera']);

        $this->assertEquals('Bozhidar', Config::get('piksera.firstName'));
        $this->assertEquals('Slaveykov', Config::get('piksera.lastName'));

        $defaultDir = $this->app->configPath();
        $configFile = $defaultDir . DIRECTORY_SEPARATOR . $this->app->environment(). DIRECTORY_SEPARATOR . 'piksera.php';

        $this->assertTrue(is_file($configFile));

        $configFileContent = include($configFile);

        $this->assertNotEmpty($configFileContent);

        $this->assertEquals('Bozhidar', $configFileContent['firstName']);
        $this->assertEquals('Slaveykov', $configFileContent['lastName']);

    }

}