<?php
namespace PikseraPackages\Template\NewWorld\tests;

use Illuminate\Support\Facades\Auth;
use PikseraPackages\App\Http\Controllers\FrontendController;
use PikseraPackages\Core\tests\TestCase;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\User\Models\User;

class BasicTemplateTest extends TestCase
{
    public $template_name = 'bloggy';

    public function testHomepage()
    {
        $this->assertTrue(true);
    }


}
