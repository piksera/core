<?php
namespace PikseraPackages\BladeUI\tests;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use PikseraPackages\BladeUI\Providers\BladeUIServiceProvider;
use PikseraPackages\Blog\Http\Controllers\BlogController;
use PikseraPackages\Content\Models\Content;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\Post\Models\Post;
use PikseraPackages\Product\Models\Product;
use PikseraPackages\Shop\Http\Controllers\ShopController;

class BladeUIServiceProviderTest extends TestCase
{
    public function testIfBladeUIServiceProviderIsLoadedInApp()
    {

        $getProvider = app()->getProvider(BladeUIServiceProvider::class);
        $this->assertInstanceOf(BladeUIServiceProvider::class, $getProvider);
    }
}
