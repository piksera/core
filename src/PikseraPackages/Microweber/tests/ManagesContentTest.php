<?php

namespace PikseraPackages\Microweber\tests;

use PikseraPackages\Content\tests\TestHelpers;
use PikseraPackages\Core\tests\TestCase;

class ManagesContentTest extends TestCase
{

    use TestHelpers;

    public function testContentGetById()
    {
        $title = 'testContentGetById' . uniqid();
        $url = 'testContentGetById' . uniqid();
        $url = str_slug($url);
        $pageId = $this->_generatePage($url, $title);

        $get = app()->piksera->contentGetById($pageId);


        $this->assertEquals($get['id'], $pageId);
        $this->assertEquals($get['title'], $title);
        $this->assertEquals($get['url'], $url);
    }


    public function testContentGet()
    {
        $params = ['limit' => 5];


        foreach (range(1, 5) as $i) {
            $url = 'test-url' . uniqid();
            $title = 'Test Title' . uniqid();
            $pageId = $this->_generatePage($url, $title);
        }


        $get = app()->piksera->contentGet($params);

        $this->assertIsArray($get);
        $this->assertCount(5, $get);
    }

    public function testContentGetByURL()
    {
        $url = 'test-url' . uniqid();
        $title = 'Test Title' . uniqid();
        $pageId = $this->_generatePage($url, $title);

        $get = app()->piksera->contentGetByURL($url);

        $this->assertIsArray($get);
        $this->assertEquals($url, $get['url']);
    }

    public function testContentGetByTitle()
    {
        $url = 'test-url' . uniqid();
        $title = 'Test Title' . uniqid();
        $pageId = $this->_generatePage($url, $title);
        $get = app()->piksera->contentGetByTitle($title);

        $this->assertIsArray($get);
        $this->assertEquals($title, $get['title']);
    }

    public function testContentSave()
    {


        $data = ['title' => 'Test Title' . uniqid(), 'url' => 'test-url' . uniqid(), 'content_type' => 'page', 'subtype' => 'dynamic', 'is_active' => 1];
        $savedId = app()->piksera->contentSave($data);
        $save = app()->piksera->contentGetById($savedId);

        $this->assertIsArray($save);
        $this->assertEquals($data['title'], $save['title']);
        $this->assertEquals($data['url'], $save['url']);
    }

    public function testContentUnpublish()
    {
        $url = 'test-url' . uniqid();
        $title = 'Test Title' . uniqid();
        $pageId = $this->_generatePage($url, $title);
        $unpublish = app()->piksera->contentUnpublish($pageId);

        $this->assertEquals($pageId,$unpublish);
    }

    public function testContentPublish()
    {
        $url = 'test-url' . uniqid();
        $title = 'Test Title' . uniqid();
        $pageId = $this->_generatePage($url, $title);
        $publish = app()->piksera->contentPublish($pageId);

        $this->assertEquals($pageId,$publish);
    }
}
