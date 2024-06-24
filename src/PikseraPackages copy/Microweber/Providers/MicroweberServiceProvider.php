<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Microweber\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Admin\Providers\AdminServiceProvider;
use PikseraPackages\Backup\Providers\BackupServiceProvider;
use PikseraPackages\BladeUI\Providers\BladeUIServiceProvider;
use PikseraPackages\Blog\BlogServiceProvider;
use PikseraPackages\Cart\CartManagerServiceProvider;
use PikseraPackages\Cart\Providers\CartEventServiceProvider;
use PikseraPackages\Category\Providers\CategoryEventServiceProvider;
use PikseraPackages\Category\Providers\CategoryServiceProvider;
use PikseraPackages\Checkout\CheckoutManagerServiceProvider;
use PikseraPackages\Content\ContentManagerServiceProvider;
use PikseraPackages\Content\ContentServiceProvider;
use PikseraPackages\ContentData\Providers\ContentDataEventServiceProvider;
use PikseraPackages\ContentData\Providers\ContentDataServiceProvider;
use PikseraPackages\ContentDataVariant\Providers\ContentDataVariantServiceProvider;
use PikseraPackages\ContentField\Providers\ContentFieldServiceProvider;
use PikseraPackages\ContentFilter\Providers\ContentFilterServiceProvider;
use PikseraPackages\Country\CountryServiceProvider;
use PikseraPackages\Currency\CurrencyServiceProvider;
use PikseraPackages\Customer\Providers\CustomerEventServiceProvider;
use PikseraPackages\Customer\Providers\CustomerServiceProvider;
use PikseraPackages\CustomField\Providers\CustomFieldEventServiceProvider;
use PikseraPackages\CustomField\Providers\CustomFieldServiceProvider;
use PikseraPackages\Database\DatabaseManagerServiceProvider;
use PikseraPackages\Event\EventManagerServiceProvider;
use PikseraPackages\FileManager\FileManagerServiceProvider;
use PikseraPackages\Form\Providers\FormServiceProvider;
use PikseraPackages\FormBuilder\Providers\FormBuilderServiceProvider;
use PikseraPackages\Fortify\FortifyServiceProvider;
use PikseraPackages\Helper\HelpersServiceProvider;
use PikseraPackages\Install\InstallServiceProvider;
use PikseraPackages\LiveEdit\Providers\LiveEditRouteServiceProvider;
use PikseraPackages\LiveEdit\Providers\LiveEditServiceProvider;
use PikseraPackages\Livewire\LivewireServiceProvider;
use PikseraPackages\Marketplace\MarketplaceServiceProvider;
use PikseraPackages\Media\MediaManagerServiceProvider;
use PikseraPackages\Menu\Providers\MenuEventServiceProvider;
use PikseraPackages\Menu\Providers\MenuServiceProvider;
use PikseraPackages\MetaTags\Providers\MetaTagsServiceProvider;
use PikseraPackages\Microweber\Microweber;
use PikseraPackages\MicroweberUI\Providers\MicroweberUIServiceProvider;
use PikseraPackages\Module\ModuleServiceProvider;
use PikseraPackages\Multilanguage\MultilanguageServiceProvider;
use PikseraPackages\Notification\Providers\MailTemplatesServiceProvider;
use PikseraPackages\Notification\Providers\NotificationServiceProvider;
use PikseraPackages\Offer\Providers\OfferServiceProvider;
use PikseraPackages\OpenApi\Providers\SwaggerServiceProvider;
use PikseraPackages\Option\Providers\OptionServiceProvider;
use PikseraPackages\Order\Providers\OrderEventServiceProvider;
use PikseraPackages\Order\Providers\OrderServiceProvider;
use PikseraPackages\Page\PageServiceProvider;
use PikseraPackages\Payment\PaymentManagerServiceProvider;
use PikseraPackages\Post\PostServiceProvider;
use PikseraPackages\Product\ProductServiceProvider;
use PikseraPackages\Queue\Providers\QueueEventServiceProvider;
use PikseraPackages\Queue\Providers\QueueServiceProvider;
use PikseraPackages\Repository\Providers\RepositoryEventServiceProvider;
use PikseraPackages\Repository\Providers\RepositoryServiceProvider;
use PikseraPackages\Role\RoleServiceProvider;
use PikseraPackages\Shipping\ShippingManagerServiceProvider;
use PikseraPackages\Shop\ShopManagerServiceProvider;
use PikseraPackages\Tag\TagsManagerServiceProvider;
use PikseraPackages\Tax\TaxManagerServiceProvider;
use PikseraPackages\Template\TemplateEventServiceProvider;
use PikseraPackages\Template\TemplateManagerServiceProvider;
use PikseraPackages\Translation\Providers\TranslationServiceProvider;
use PikseraPackages\User\Providers\UserEventServiceProvider;
use PikseraPackages\User\Providers\UserServiceProvider;
use PikseraPackages\Utils\Captcha\Providers\CaptchaEventServiceProvider;
use PikseraPackages\Utils\Captcha\Providers\CaptchaServiceProvider;
use PikseraPackages\View\ViewServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

class MicroweberServiceProvider extends ServiceProvider
{

    public function register(): void
    {


        /**
         * @property Microweber $microweber
         */
        $this->app->singleton('microweber', function () {
            return new Microweber();
        });

        $this->registerInternalProviders();

    }

    public function registerInternalProviders(): void
    {


        $this->app->register(HelpersServiceProvider::class);
        $this->app->register(LiveEditRouteServiceProvider::class);

        $this->app->register(ViewServiceProvider::class);
        $this->app->register(MicroweberUIServiceProvider::class);
        $this->app->register(BladeUIServiceProvider::class);
        $this->app->register(LivewireServiceProvider::class);


        $this->app->register(FortifyServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
        $this->app->register(OptionServiceProvider::class);

        $this->app->register(InstallServiceProvider::class);

        $this->app->register(AdminServiceProvider::class);


        $this->app->register(LiveEditServiceProvider::class);


        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(RepositoryEventServiceProvider::class);
        $this->app->register(MediaManagerServiceProvider::class);
        //$this->app->register(DebugbarServiceProvider::class);


        //   $this->app->register(TaggableFileCacheServiceProvider::class);
        //$this->app->register(AlternativeCacheStoresServiceProvider::class);

        // $this->app->register(AssetsServiceProvider::class);
        $this->app->register(TranslationServiceProvider::class);
        $this->app->register(TagsManagerServiceProvider::class);


        $this->app->register('Conner\Tagging\Providers\TaggingServiceProvider');
        $this->app->register(EventManagerServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(ContentServiceProvider::class);
        $this->app->register(ContentManagerServiceProvider::class);
        $this->app->register(CategoryServiceProvider::class);
        $this->app->register(CategoryEventServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);
        $this->app->register(MenuEventServiceProvider::class);
        $this->app->register(ProductServiceProvider::class);
        $this->app->register(PostServiceProvider::class);
        $this->app->register(ContentDataServiceProvider::class);
        $this->app->register(ContentDataVariantServiceProvider::class);
        $this->app->register(ContentDataEventServiceProvider::class);
        $this->app->register(ContentFieldServiceProvider::class);
        $this->app->register(CustomFieldServiceProvider::class);
        $this->app->register(CustomFieldEventServiceProvider::class);
        $this->app->register(TemplateEventServiceProvider::class);

        $this->app->register(TemplateManagerServiceProvider::class);
        $this->app->register(DatabaseManagerServiceProvider::class);
        $this->app->register(MetaTagsServiceProvider::class);

        // Shop
        $this->app->register(ShopManagerServiceProvider::class);
        $this->app->register(TaxManagerServiceProvider::class);
        $this->app->register(PaymentManagerServiceProvider::class);
        $this->app->register(OrderServiceProvider::class);
        $this->app->register(OrderEventServiceProvider::class);
        $this->app->register(CurrencyServiceProvider::class);
        $this->app->register(CheckoutManagerServiceProvider::class);
        $this->app->register(CartManagerServiceProvider::class);
        $this->app->register(ShippingManagerServiceProvider::class);
        $this->app->register(OfferServiceProvider::class);
        $this->app->register(FileManagerServiceProvider::class);
        $this->app->register(FormServiceProvider::class);
        $this->app->register(FormBuilderServiceProvider::class);
        $this->app->register(UserEventServiceProvider::class);
        $this->app->register(CartEventServiceProvider::class);

        // Others
        $this->app->register(MarketplaceServiceProvider::class);
        $this->app->register(CaptchaServiceProvider::class);
        $this->app->register(CaptchaEventServiceProvider::class);
        $this->app->register(BackupServiceProvider::class);
        //  $this->app->register(ImportServiceProvider::class);
        $this->app->register(CustomerServiceProvider::class);
        $this->app->register(CustomerEventServiceProvider::class);
        $this->app->register(PermissionServiceProvider::class);
        //$this->app->register(PaymentServiceProvider::class);
        $this->app->register(RoleServiceProvider::class);
        $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
        //   $this->app->register(  \L5Swagger\L5SwaggerServiceProvider::class);
        $this->app->register(SwaggerServiceProvider::class);
        //   $this->app->register(  \Laravel\Sanctum\SanctumServiceProvider::class);
        $this->app->register(CountryServiceProvider::class);
        $this->app->register(\EloquentFilter\ServiceProvider::class);
        $this->app->register(MailTemplatesServiceProvider::class);
        $this->app->register(NotificationServiceProvider::class);
        $this->app->register(QueueServiceProvider::class);
        $this->app->register(QueueEventServiceProvider::class);
        $this->app->register(ContentFilterServiceProvider::class);
        $this->app->register(BlogServiceProvider::class);

        $this->app->register(MultilanguageServiceProvider::class);
        $this->app->register(ModuleServiceProvider::class);
    }
}
