<?php

namespace PikseraPackages\ContentField\TranslateTables;

use PikseraPackages\Multilanguage\TranslateTable;

class TranslateContentField extends TranslateTable
{

    protected $relId = 'id';
    protected $relType = 'content_fields';

    protected $columns = [
        'value'
    ];

}
