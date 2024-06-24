<?php

namespace PikseraPackages\Core\Config\tests;

use Config;
use PikseraPackages\Core\tests\TestCase;

class ConfigFileTest extends TestCase
{
    public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }

    public function testConfigRead()
    {
        $connection = Config::get('database.connections');

        $this->assertTrue(true, !empty($connection));
    }

    public function testConfigWrite()
    {
        $now = date('Y-m-d H:i:s');
        $old = Config::get('piksera_tests.last_test');

        Config::set('piksera_tests.last_test', $now);
        $current = Config::get('piksera_tests.last_test');

        Config::save('piksera_tests');

        $get = Config::get('piksera_tests.last_test');

        $this->assertTrue(true, !empty($get));
        $this->assertTrue(true, $now == $get);
        $this->assertTrue(true, $current == $get);
        $this->assertTrue(true, $old != $get);
    }
}
