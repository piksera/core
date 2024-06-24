<?php
/**
 * @author Bobi piksera
 */
namespace PikseraPackages\Multilanguage\Http\Middleware;

use PikseraPackages\Multilanguage\MultilanguageHelpers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MultilanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        return $next($request);
    }
}
