<?php

namespace PikseraPackages\LiveEdit\Http\Middleware;

use Illuminate\Http\Request;
use PikseraPackages\LiveEdit\Events\ServingLiveEdit;

class DispatchServingLiveEdit
{
    public function handle(Request $request, \Closure $next)
    {
        ServingLiveEdit::dispatch();

        return $next($request);
    }
}
