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

namespace PikseraPackages\Utils\Captcha\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Utils\Captcha\CaptchaManager;
use PikseraPackages\Utils\Captcha\Validators\CaptchaValidator;


class CaptchaServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \PikseraPackages\Utils\Captcha\CaptchaManager $captcha_manager
         */
        $this->app->singleton('captcha_manager', function ($app) {
            return new CaptchaManager();
        });

        \Validator::extendImplicit('captcha', CaptchaValidator::class.'@validate', 'Invalid captcha answer!');



    }
}
