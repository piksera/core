<?php

namespace PikseraPackages\Microweber\tests;

use PikseraPackages\Content\tests\TestHelpers;
use PikseraPackages\Core\tests\TestCase;

class ManagesUrlTest extends TestCase
{

    public function testSiteUrl()
    {
        $url = app()->microweber->siteUrl();
        $this->assertEquals($url, app()->url_manager->site());
    }

    public function testSiteHostname()
    {
        $hostname = app()->microweber->siteHostname();
        $this->assertEquals($hostname, app()->url_manager->hostname());
    }
}