<?php

namespace PikseraPackages\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GrahamCampbell\SecurityCore\Security;
use Illuminate\Support\Facades\Log;
use PikseraPackages\Helper\HTMLClean;
use PikseraPackages\Helper\XSSClean;

class XSS
{
    public function handle(Request $request, Closure $next)
    {
      //  return $next($request);
        $input = $request->all();

        if (($request->isMethod('post')  or $request->isMethod('patch') or $request->isMethod('put') ) and !empty($input)) {

            $options = [];
            if(is_admin()){
                 $options['admin_mode'] = true;
            }
            $xssClean = new XSSClean();
            array_walk_recursive($input, function (&$input) use ($options,$xssClean) {
                if (is_string($input)) {
                     $input = $xssClean->clean($input);

                }
            });
        }


        $request->merge($input);
        return $next($request);
    }

}
