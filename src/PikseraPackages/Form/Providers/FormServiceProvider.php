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

namespace PikseraPackages\Form\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use PikseraPackages\CustomField\FieldsManager;
use PikseraPackages\Form\FormsManager;
use Illuminate\Contracts\Support\DeferrableProvider;

class FormServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \PikseraPackages\Form\FormsManager $forms_manager
         */
        $this->app->singleton('forms_manager', function ($app) {
            return new FormsManager();
        });

        /**
         * @property \PikseraPackages\CustomField\FieldsManager $fields_manager
         */
        $this->app->singleton('fields_manager', function ($app) {
            return new FieldsManager();
        });

        Validator::extendImplicit('valid_image', 'PikseraPackages\Form\Validators\ImageValidator@validate', 'Invalid image file');

        $this->loadMigrationsFrom(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'migrations/');
        $this->loadRoutesFrom(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes/api_public.php');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fields_manager','forms_manager'];
    }

}
