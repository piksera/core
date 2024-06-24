<?php

namespace PikseraPackages\MetaTags\Facades;

use Illuminate\Support\Facades\Facade;



/**
 * Class FrontendMetaTags
 *
 * @method static string getHeadMetaTags()
 * @method static string getFooterMetaTags()
 *
 * @see \PikseraPackages\MetaTags\FrontendMetaTagsRenderer
 * @mixin \PikseraPackages\MetaTags\FrontendMetaTagsRenderer
 */
class FrontendMetaTags extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \PikseraPackages\MetaTags\FrontendMetaTagsRenderer::class;
    }
}
