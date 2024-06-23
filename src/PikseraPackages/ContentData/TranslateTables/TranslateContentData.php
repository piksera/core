<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace PikseraPackages\ContentData\TranslateTables;

use PikseraPackages\Multilanguage\TranslateTable;

class TranslateContentData extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'content_data';

    protected $columns = [
        'field_value'
    ];

}
