<?php

namespace PikseraPackages\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GrahamCampbell\SecurityCore\Security;
use PikseraPackages\Helper\HTMLClean;

class PageViewMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        event_trigger('mw.pageview', $request);

        return $next($request);
    }

}
