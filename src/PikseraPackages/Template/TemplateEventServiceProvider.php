<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/piksera/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Template;




use PikseraPackages\App\Providers\EventServiceProvider;
use PikseraPackages\Option\Events\OptionWasCreated;
use PikseraPackages\Option\Events\OptionWasDeleted;
use PikseraPackages\Option\Events\OptionWasUpdated;
use PikseraPackages\Template\Listeners\TemplateClearCachedCssListener;

class TemplateEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        OptionWasUpdated::class => [
            TemplateClearCachedCssListener::class,
        ],
        OptionWasCreated::class => [
            TemplateClearCachedCssListener::class,
        ],
        OptionWasDeleted::class => [
            TemplateClearCachedCssListener::class,
        ],
    ];
}
