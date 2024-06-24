<?php

namespace PikseraPackages\MetaTags\Providers;

use Butschster\Head\Facades\PackageManager;
use Butschster\Head\Packages\Package;
use Illuminate\Support\ServiceProvider;

class MetaTagsServiceProvider extends \Butschster\Head\Providers\MetaTagsApplicationServiceProvider
{
    public function register(): void
    {
        parent::register();



        $this->app->singleton(\PikseraPackages\MetaTags\FrontendMetaTagsRenderer::class);
        $this->app->singleton(\PikseraPackages\MetaTags\AdminMetaTagsRenderer::class);


        if (app()->environment() === 'testing') {
            $this->app->register(MetaTagsUnitTestServiceProvider::class);
        }

    }

    protected function packages()
    {

        PackageManager::create('frontend', function (Package $package) {
            $package->requires([
                'core_css',
                'core',
                'custom_user_css',
                'custom_user_meta_tags',
            ]);
        });

        PackageManager::create('admin', function (Package $package) {
            $package->requires([
               'core_css',
                'admin_default_css_and_js',
                'core',
                'admin_custom_css_and_js',
            ]);

        });
        PackageManager::create('core_css', function (Package $package) {
            $package->addTag(
                'system_default_css_head_tags',
                new \PikseraPackages\MetaTags\Entities\SystemDefaultCssHeadTags()
            );
        });
        PackageManager::create('core', function (Package $package) {
            $package->addTag(
                'favicon_head_tag',
                new \PikseraPackages\MetaTags\Entities\FaviconHeadTag()
            );

            $package->addTag(
                'generator_head_tag',
                new \PikseraPackages\MetaTags\Entities\GeneratorHeadTag()
            );
            $package->addTag(
                'apijs',
                new \PikseraPackages\MetaTags\Entities\ApijsScriptTag()
            );
            $package->addTag(
                'live_wire_head_tags',
                new \PikseraPackages\MetaTags\Entities\LivewireHeadTags()
            );
            $package->addTag(
                'live_wire_footer_tags',
                new \PikseraPackages\MetaTags\Entities\LivewireFooterTags()
            );

        });


        PackageManager::create('custom_user_css', function (Package $package) {
            $package->addTag(
                'live_edit_css_head_tags_preload',
                new \PikseraPackages\MetaTags\Entities\LiveEditCssHeadPrealoadTags()
            );
            $package->addTag(
                'live_edit_css_head_tags',
                new \PikseraPackages\MetaTags\Entities\LiveEditCssHeadTags()
            );
            $package->addTag(
                'custom_fonts_css_head_tags',
                new \PikseraPackages\MetaTags\Entities\CustomFontsCssHeadTags()
            );
            $package->addTag(
                'custom_css_head_tags',
                new \PikseraPackages\MetaTags\Entities\CustomCssHeadTags()
            );
            $package->addTag(
                'frontend_animations_script_tag',
                new \PikseraPackages\MetaTags\Entities\FrontendAnimationsScriptTag()
            );

        });


        PackageManager::create('custom_user_meta_tags', function (Package $package) {
            $package->addTag(
                'custom_user_head_tags',
                new \PikseraPackages\MetaTags\Entities\CustomUserHeadTags()
            );
            $package->addTag(
                'custom_head_tags_from_site_header_event',
                new \PikseraPackages\MetaTags\Entities\CustomHeadTagsFromSiteHeaderEvent()
            );
            $package->addTag(
                'custom_head_tags_from_callback',
                new \PikseraPackages\MetaTags\Entities\CustomHeadTagsFromCallback()
            );
            $package->addTag(
                'webmaster_head_tags',
                new \PikseraPackages\MetaTags\Entities\WebmasterHeadTags()
            );
            $package->addTag(
                'author_head_tags',
                new \PikseraPackages\MetaTags\Entities\AuthorHeadTags()
            );

            $package->addTag(
                'custom_user_footer_tags',
                new \PikseraPackages\MetaTags\Entities\CustomUserFooterTags()
            );
            $package->addTag(
                'custom_footer_tags_from_callback',
                new \PikseraPackages\MetaTags\Entities\CustomFooterTagsFromCallback()
            );
        });


        PackageManager::create('admin_default_css_and_js', function (Package $package) {
            $package->addTag(
                'admin_default_head_tags',
                new \PikseraPackages\MetaTags\Entities\SystemDefaultAdminCssHeadTags()
            );
            $package->addTag(
                'admin_web_app_manifest',
                new \PikseraPackages\MetaTags\Entities\AdminWebAppManifestTags()
            );
        });
        PackageManager::create('admin_custom_css_and_js', function (Package $package) {
            $package->addTag(
                'admin_head_tags_from_admin_manager',
                new \PikseraPackages\MetaTags\Entities\AdminHeadTagsFromAdminManager()
            );
        });


    }


}
