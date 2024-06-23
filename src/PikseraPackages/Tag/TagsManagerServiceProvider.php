<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Tag;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Multilanguage\TranslateTables\TranslateOption;
use PikseraPackages\Tag\Model\Tag;
use PikseraPackages\Tag\Model\Tagged;
use PikseraPackages\Tag\Model\TagGroup;
use PikseraPackages\Tag\TranslateTables\TranslateTaggingTagged;
use PikseraPackages\Tag\TranslateTables\TranslateTaggingTags;

class TagsManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        \Config::set('tagging.tag_model', Tag::class);
        \Config::set('tagging.tagged_model', Tagged::class);
        \Config::set('tagging.tag_group_model', TagGroup::class);

        $this->app->translate_manager->addTranslateProvider(TranslateTaggingTags::class);
        $this->app->translate_manager->addTranslateProvider(TranslateTaggingTagged::class);

        /**
         * @property \PikseraPackages\Tag\TagsManager    $tags_manager
         */
        $this->app->singleton('tags_manager', function ($app) {
            return new TagsManager();
        });
    }
}
