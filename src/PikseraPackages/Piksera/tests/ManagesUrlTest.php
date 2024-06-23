<?php

namespace PikseraPackages\Piksera\tests;

use PikseraPackages\Content\tests\TestHelpers;
use PikseraPackages\Core\tests\TestCase;

class ManagesUrlTest extends TestCase
{

    public function testSiteUrl()
    {
        $url = app()->piksera->siteUrl();
        $this->assertEquals($url, app()->url_manager->site());
    }

    public function testSiteHostname()
    {
        $hostname = app()->piksera->siteHostname();
        $this->assertEquals($hostname, app()->url_manager->hostname());
    }
}
