<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace PikseraPackages\Multilanguage\TranslateTables;

use PikseraPackages\Multilanguage\TranslateTable;

class TranslateDynamicTextVariables extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'dynamic_text_variables';

    protected $columns = [
        'content'
    ];

}
