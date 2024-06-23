<?php

namespace PikseraPackages\App\Managers\Helpers;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class VerifyCsrfTokenHelper extends VerifyCsrfToken
{
    public function isValid($request)
    {
        return $this->tokensMatch($request);
    }
}
