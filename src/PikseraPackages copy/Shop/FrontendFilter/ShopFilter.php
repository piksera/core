<?php
namespace PikseraPackages\Shop\FrontendFilter;

use PikseraPackages\Blog\FrontendFilter\BaseFilter;
use PikseraPackages\Blog\FrontendFilter\Traits\CustomFieldsTrait;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\Shop\FrontendFilter\Traits\PriceFilter;

class ShopFilter extends BaseFilter {

    use PriceFilter, CustomFieldsTrait;

    // public $viewNamespace = 'shop';

    public function getMainPageId()
    {
        $contentFromId = get_option('content_from_id', $this->params['moduleId']);
        if ($contentFromId) {
            return $contentFromId;
        }

        $findFirstShop = Page::where('content_type', 'page')
            ->where('subtype','dynamic')
            ->where('is_shop', 1)
            ->first();

        if ($findFirstShop) {
            return $findFirstShop->id;
        }

        return 0;
    }
}
