<?php
namespace PikseraPackages\App\tests;

use Illuminate\Support\Facades\Config;
use PikseraPackages\Config\ConfigSave;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Install\TemplateInstaller;

class TemplateInstallerTest extends TestCase
{
    public function testInstall()
    {
        $logger = new MyCustomLogger();

        Config::set('piksera.install_default_template', 'bloggy');
        Config::set('piksera.install_default_template_content', 1);

        $installer = new TemplateInstaller();
        $installer->logger = $logger;
        $status = $installer->run();
        $this->assertTrue($status);

    }
}

class MyCustomLogger {

    public function setLogInfo()
    {

    }

    public function log($text)
    {

    }
    public function clearLog()
    {

    }
}
