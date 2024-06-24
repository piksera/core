<?php

namespace PikseraPackages\Admin\tests;

use PikseraPackages\Core\tests\TestCase;

class AdminTest extends TestCase
{
    public function testAdmin()
    {
        $this->assertTrue(true);
    }

    public function testAdminManagerFacade()
    {

        \PikseraPackages\Admin\Facades\AdminManager::addScript('test-my-module-admin-js', 'test.js', ['test' => 1]);
        \PikseraPackages\Admin\Facades\AdminManager::addStyle('test-module-admin-css', 'test.css', ['test' => 2]);
        \PikseraPackages\Admin\Facades\AdminManager::addCustomHeadTag('<script>alert("ok")</script>');

        $scrips = \PikseraPackages\Admin\Facades\AdminManager::scripts();
        $styles = \PikseraPackages\Admin\Facades\AdminManager::styles();
        $custom = \PikseraPackages\Admin\Facades\AdminManager::customHeadTags();

        $this->assertStringContainsString('<script id="test-my-module-admin-js" src="test.js" test="1"></script>', $scrips);
        $this->assertStringContainsString('<link rel="stylesheet" id="test-module-admin-css" href="test.css" type="text/css" test="2" />', $styles);
        $this->assertStringContainsString('<script>alert("ok")</script>', $custom);

        $all = \PikseraPackages\Admin\Facades\AdminManager::headTags();

        $this->assertStringContainsString('<script id="test-my-module-admin-js" src="test.js" test="1"></script>', $all);
        $this->assertStringContainsString('<link rel="stylesheet" id="test-module-admin-css" href="test.css" type="text/css" test="2" />', $all);
        $this->assertStringContainsString('<script>alert("ok")</script>', $all);



    }
}
