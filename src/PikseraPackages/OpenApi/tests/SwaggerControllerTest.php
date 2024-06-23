<?php

namespace PikseraPackages\OpenApi\tests;

use PikseraPackages\Core\tests\TestCase;


class SwaggerControllerTest extends TestCase
{

    public function testIfSwaggerDocsJsonIsNotGivingError()
    {

        $swagger = app()->make('\PikseraPackages\OpenApi\Http\Controllers\SwaggerController');
        $resp = $swagger->docs(request());
        $this->assertEquals(true, is_object($resp));
        $this->assertEquals(true, !empty($resp));
    }


}
