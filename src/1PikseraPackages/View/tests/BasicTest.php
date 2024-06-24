<?php
namespace PikseraPackages\View\tests;

use PikseraPackages\Core\tests\TestCase;

class BasicTest extends TestCase
{
    public function testConstructorThrowsExceptionForNonexistentFile()
    {
        $this->expectException(\Exception::class);

        new \PikseraPackages\View\View('/path/to/nonexistent/file');
    }
}
