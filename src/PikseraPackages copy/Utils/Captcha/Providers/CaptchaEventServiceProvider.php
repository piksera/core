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

namespace PikseraPackages\Utils\Captcha\Providers;


use Events\NewComment;
use PikseraPackages\App\Providers\EventServiceProvider;
use PikseraPackages\Utils\Captcha\Listeners\NewCommentListener;

class CaptchaEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        NewComment::class => [
            NewCommentListener::class
        ],
    ];
}

