<?php

namespace PikseraPackages\MetaTags\Facades;

use Illuminate\Support\Facades\Facade;



/**
 * Class AdminMetaTags
 *
 * @method static string getHeadMetaTags()
 * @method static string getFooterMetaTags()
 *
 * @see \PikseraPackages\MetaTags\AdminMetaTagsRenderer
 * @mixin \PikseraPackages\MetaTags\AdminMetaTagsRenderer
 */
class AdminMetaTags extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \PikseraPackages\MetaTags\AdminMetaTagsRenderer::class;
    }
}
