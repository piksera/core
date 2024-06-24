<?php

namespace PikseraPackages\Translation\Models;



use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;

class TranslationKeyCached extends TranslationKey
{
    use CacheableQueryBuilderTrait;
}
