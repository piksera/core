<?php

namespace PikseraPackages\Install\Schema;

class Countries
{
    public function get()
    {
        return [
            'countries' => [
                'code' => 'string',
                'name' => 'string',
                'continent' => 'string',
                'surfacearea' => 'float',
                'population' => 'integer',
                'localname' => 'string',
            ],
        ];
    }

    public function seed()
    {
        $table_sql = PS_PATH.'Utils'.DS.'lib'.DS.'countries.sql';

        mw()->database_manager->import_sql_file($table_sql);
    }
}
